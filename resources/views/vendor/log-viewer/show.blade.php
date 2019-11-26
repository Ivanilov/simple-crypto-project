@extends('backend.layouts.app')

@push('after-styles')
    @include('log-viewer::_template.style')
@endpush

@section ('title', 'Log '. $log->date. ' | '. app_name())

@section ('page-title')
    <span class="text-semibold">Log Viewer</span> - Log [{{ $log->date }}]
@endsection

@section ('heading-elements')
    @include('log-viewer::includes.header-buttons')
@endsection

@section('content')
    <div class="panel panel-flat">

        <div class="panel-heading">
            <h5 class="panel-title">Log dashboard <small><i>{{ $log->getPath() }}</i></small>
                <a class="heading-elements-toggle"><i class="icon-more"></i></a>
            </h5>
            <div class="heading-elements">
                <div class="btn-group heading-btn">
                    <div class="float-right">
                        <a href="{{ route('log-viewer::logs.download', [$log->date]) }}" class="btn btn-sm btn-success">
                            <i class="fa fa-download"></i> DOWNLOAD
                        </a>
                        <a href="#delete-log-modal" class="btn btn-sm btn-danger" data-toggle="modal" data-backdrop="false">
                            <i class="fa fa-trash-o"></i> DELETE
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-body log-viewer">
            <div class="row">
                <div class="col-md-2">
                    @include('log-viewer::_partials.menu')
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-sm-auto">
                                            Created at: <span class="badge badge-primary">{{ $log->createdAt() }}</span>
                                        </div>
                                        <div class="col-sm-auto">
                                            Updated at: <span class="badge badge-primary">{{ $log->updatedAt() }}</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-sm-auto">
                                            Log entries: <span class="badge badge-primary">{{ $entries->total() }}</span>
                                        </div>
                                        <div class="col-sm-auto">
                                            Size: <span class="badge badge-primary">{{ $log->size() }}</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Log Entries --}}
                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="entries" class="table" style="word-break: break-word;">
                                    <thead>
                                    <tr>
                                        <th>Level</th>
                                        <th>Header</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($entries as $key => $entry)
                                        <tr>
                                            <td>
                                    <span class="badge level level-{{ $entry->level }}">
                                        {!! $entry->level() !!}
                                    </span>
                                            </td>
                                            <td>
                                                <span class="badge badge-env">{{ $entry->env }}</span>
                                                <span class="badge badge-default"> {{ $entry->datetime->format('H:i:s') }} </span>

                                                {{ $entry->header }}
                                                @if ($entry->hasStack())
                                                    <a class="btn btn-sm btn-outline-info" role="button" data-toggle="collapse" href="#log-stack-{{ $key }}" aria-expanded="false" aria-controls="log-stack-{{ $key }}">
                                                        <i class="fa fa-toggle-on"></i> Stack
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @if ($entry->hasStack())
                                            <tr class="stack-content collapse" id="log-stack-{{ $key }}">
                                                <td colspan="5" class="stack">
                                                    <pre class="language-markup content-group"><code>{!! trim($entry->stack()) !!}</code></pre>
                                                </td>
                                            </tr>
                                        @endif
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                <span class="badge badge-default">{{ __('log-viewer::general.empty-logs') }}</span>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @if ($entries->hasPages())
        <div class="panel-footer">
            <div class="heading-elements">
                <div class="heading-btn">
                    <span class="badge badge-info">
                        Page {!! $entries->currentPage() !!} of {!! $entries->lastPage() !!}
                    </span>
                </div>
                <div class="heading-btn pull-right">
                    {!! $entries->appends(compact('query'))->render('log-viewer::_pagination.bootstrap-4') !!}
                </div>
            </div>
        </div>
        @endif
    </div>

    <div id="delete-log-modal" class="modal fade">
        <div class="modal-dialog">
            <form id="delete-log-form" action="{{ route('log-viewer::logs.delete') }}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="date" value="{{ $log->date }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Log File</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to <span class="badge badge-danger">DELETE</span> this log file <span class="badge badge-primary">{{ $log->date }}</span> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-danger" data-loading-text="Loading&hellip;"><i class="fa fa-trash-o"></i> DELETE FILE</button>
                        <button type="button" class="btn btn-sm btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('after-scripts')
    <script>
        $(function () {
            var deleteLogModal = $('#delete-log-modal'),
                deleteLogForm  = $('#delete-log-form'),
                submitBtn      = deleteLogForm.find('button[type=submit]');

            deleteLogForm.on('submit', function(event) {
                event.preventDefault();
                submitBtn.button('loading');

                $.ajax({
                    url:      $(this).attr('action'),
                    type:     $(this).attr('method'),
                    dataType: 'json',
                    data:     $(this).serialize(),
                    success: function(data) {
                        submitBtn.button('reset');
                        if (data.result === 'success') {
                            deleteLogModal.modal('hide');
                            location.replace("{{ route('log-viewer::logs.list') }}");
                        }
                        else {
                            alert('OOPS ! This is a lack of coffee exception!')
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        alert('AJAX ERROR ! Check the console !');
                        console.error(errorThrown);
                        submitBtn.button('reset');
                    }
                });

                return false;
            });

            @unless (empty(log_styler()->toHighlight()))
                $('.stack-content').each(function() {
                    var $this = $(this);
                    var html = $this.html().trim()
                        .replace(/({!! join(log_styler()->toHighlight(), '|') !!})/gm, '<strong>$1</strong>');

                    $this.html(html);
                });
            @endunless
        });
    </script>
@endpush
