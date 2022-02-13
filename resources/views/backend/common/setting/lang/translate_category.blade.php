@extends('backend.layouts.master')
@section('title') @translate(Category List) ({{ $lang->code }}) @endsection
@section('content')

    <div class="row">
        <div class="m-2">
            <a class="btn btn-primary" href="{{ route("language.index") }}">
                @translate(Language List)
            </a>

            <a class="btn btn-primary" href="{{ route("language.categories.translate", $lang->id) }}">
                @translate(Translate Category Names)
            </a>

             <a class="btn btn-primary" href="{{ route("language.products.translate", $lang->id) }}">
                @translate(Translate Product Names)
            </a>

        </div>
    </div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="panel-title text-center">@translate(Category Translate)</h3>
            <p class="text-muted">@translate(You Can translate your own language in tow click,Follow this), <br>
                @translate(google translate extension any browser then open the language translate)
                @translate(page then click the google translate extension)
                @translate(and translate the page and click the Copy Translations button and save.) </p>
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="{{ route('language.categories.translate.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$lang->id}}">
                <div class="panel-body">
                    <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%"
                           id="tranlation-table">
                        <tbody class="">

                        @foreach (trans('categories', [], $lang->code) as $key => $value)
                            <tr class="">
                                <td>{{ $loop->index+1 }}</td>
                                <td class="key w-25">{{ $key }}</td>
                                <td>
                                    <input type="hidden" name="key[]" value="{{ $key }}">
                                    <input type="text" class="form-control value w-100"
                                           name="value[]"
                                           value="{{ $value }}">
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>


                <div class="form-group">
                    <div class="col-lg-12 text-right">
                        <button class="btn btn-primary" type="button" onclick="copy()">@translate(Copy Translations)
                        </button>
                        <button class="btn btn-primary" type="submit">@translate(Save)</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection






