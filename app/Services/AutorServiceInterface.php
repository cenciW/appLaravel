<?php

namespace App\Services;

use App\Models\Autor;
use Illuminate\Http\Request;

interface AutorServiceInterface {


    public function index();
    public function store(Request $request);
    public function show($id);
    public function update(Request $request, string $id);
    public function destroy($id);

}