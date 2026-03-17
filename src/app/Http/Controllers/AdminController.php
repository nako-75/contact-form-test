<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard(){
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();
        return view('admin', compact('contacts','categories'));
    }

    public function search(Request $request){
        $query = Contact::query();
        if ($request->filled('keyword')){
            $keyword = $request->keyword;
            $keywordClean = str_replace([' ', '　'], '', $keyword);
            $query->where(function($q) use ($keyword, $keywordClean) {
            $q->where('last_name', 'like', '%' . $keyword . '%')
                ->orWhere('first_name', 'like', '%' . $keyword . '%')
                ->orWhere('email', 'like', '%' . $keyword . '%')
                ->orWhere(DB::raw('CONCAT(last_name, first_name)'), 'like', '%' . $keywordClean . '%');
            });
        }

        if ($request->filled('gender') && $request->gender != '0') {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->paginate(7);
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }

    public function reset(Request $request){
        $request->session()->forget('search_keyword');
        return redirect('/admin');
    }

    public function export(Request $request){
        $query = Contact::query();
        if ($request->filled('keyword')){
        $keyword = $request->keyword;
        $keywordClean = str_replace([' ', '　'], '', $keyword);
        $query->where(function($q) use ($keyword, $keywordClean) {
            $q->where('last_name', 'like', '%' . $keyword . '%')
                ->orWhere('first_name', 'like', '%' . $keyword . '%')
                ->orWhere('email', 'like', '%' . $keyword . '%')
                ->orWhere(DB::raw('CONCAT(last_name, first_name)'), 'like', '%' . $keywordClean . '%');
            });
        }

        if ($request->filled('gender') && $request->gender != '0') {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->get();

        $csvHeader = ['お名前', '性別', 'メールアドレス', 'お問い合わせの種類', 'お問い合わせ内容'];

        $response = new StreamedResponse(function () use ($contacts, $csvHeader) {
        $handle = fopen('php://output', 'w');

        stream_filter_append($handle, 'convert.iconv.utf-8/cp932//TRANSLIT');

        fputcsv($handle, $csvHeader);
        foreach ($contacts as $contact) {
            $gender = ($contact->gender == 1) ? '男性' : (($contact->gender == 2) ? '女性' : 'その他');

            fputcsv($handle, [
                $contact->last_name . $contact->first_name,
                $gender,
                $contact->email,
                $contact->category->content,
                $contact->detail,
            ]);
        }
        fclose($handle);
        },
        200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="contacts.csv"',
        ]);
        return $response;
        }

        public function destroy(Request $request){
            Contact::find($request->id)->delete();
            return redirect('/admin')->with('message', 'お問い合わせを削除しました');
        }
}