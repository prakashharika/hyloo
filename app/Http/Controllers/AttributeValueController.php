<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttributeValueController extends Controller
{
    public function index()
    {
        $values = AttributeValue::with('attribute')->get();
        return view('admin.attribute-values.index', compact('values'));
    }

    public function create()
    {
        return view('admin.attribute-values.create', [
            'attributes' => Attribute::all()
        ]);
    }

    public function store(Request $request)
    {
        AttributeValue::create($request->all());
        return redirect()->route('admin.attribute-values.index');
    }
}
