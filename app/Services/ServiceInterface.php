<?php

namespace App\Services;

interface ServiceInterface {


    public function index($pesquisar, $page);
    public function store($request);
    public function show($id);
    public function update($request, string $id);
    public function destroy($id);

}