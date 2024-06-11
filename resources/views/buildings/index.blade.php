@extends('layouts.vertical', ['title' => 'Index', 'sub_title' => 'Building', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite(['node_modules/gridjs/dist/theme/mermaid.min.css'])
@endsection

@section('content')
    <div class="flex flex-col gap-6">
        <div class="card">
            <div class="card-header">
                <div class="flex justify-between items-center">
                    <h4 class="card-title">Buildings</h4>
                </div>
                <div class="flex justify-between items-center ms-5 mt-5">
                    <div class="flex items-center gap-2">
                        <button type="button" class="btn-code" data-fc-type="collapse" data-fc-target="defaultButtonsHtml">
                            <i class="mgc_eye_line text-lg"></i>
                            <a href="/buildings/create" class="ms-2">Create Building</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <div id="table-gridjs" data-buildings="{{ json_encode($buildings) }}"></div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @vite(['resources/js/pages/table-gridjs.js'])
@endsection