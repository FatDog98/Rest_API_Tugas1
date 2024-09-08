<?php

namespace App\Controllers;

class TodolistController extends BaseController
{
    public function index(): string
    {
        $model = model('TodolistModel');
        $session = session();
        $user = $session->get('id');
        $data = [
            'daftarKegiatan' => $model->where('user', $user)->findAll()
        ];
        return view('todolist', $data);
    }

    public function simpanKegiatan(): string
    {
        helper('form');
        $model = model('TodolistModel');
        $session = session();
        $user = $session->get('id');
        $dataForm = $this->request->getPost(['kegiatan']);
        $data = [
            'user' => $user,
            'kegiatan' => $dataForm
        ];
        $model->save($data);


        return $this->index();
    }
    public function selesaikegiatan(): string
    {

        $uri = $this->request->getUri();
        $idKegiatan = $uri->getSegment(3);

        $model = model('TodolistModel');

        $data = [
            "status" => "selesai"
        ];

        $model->update($idKegiatan, $data);

        return $this->index();
    }
    public function hapuskegiatan(): string
    {

        $uri = $this->request->getUri();
        $idKegiatan = $uri->getSegment(3);

        $model = model('TodolistModel');
        $model->delete($idKegiatan);

        return $this->index();

    }
}