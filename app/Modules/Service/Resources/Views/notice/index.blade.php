@extends('layouts.admin_master2')

@section('title', 'Advertisement Image')

@section('content')
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Advertisement Image</h3>
        @include('partials.flash_message')
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-overflow-container uk-margin-bottom">
                    <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons">
                    </div>
                    <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="dt_tableExport">
                        <thead>
                            <tr>
                                <th data-priority="critical">Id</th>
                                <th data-priority="critical">District</th>
                                <th data-priority="1">Sub-District</th>
                                <th data-priority="2">Service Provider</th>
                                <th data-priority="2">Image</th>
                                <th data-priority="2">Created At</th>
                                <th class="filter-false remove sorter-false uk-text-center" data-priority="1">Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>District</th>
                                <th>Sub-District</th>
                                <th>Service Provider</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th class="uk-text-center">Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php $i = 1 ?>
                        @foreach($notices as $notice)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $notice->district->district_name }}</td>
                                <td>{{ $notice->subdistrict->sub_district_name }}</td>
                                <td>{{ $notice->service_provider }}</td>
                                <td><img src="{{ asset($notice->thumbnail) }}" style="width:100px; height:80px;" /></td>
                                <td>{{ $notice->created_at }}</td>
                                <td class="uk-text-center">
                                    <a href="{{ route('notice_edit',$notice->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                    <a class="confirm">
                                    <input class="confirm_id" type="hidden" name="id" value="{{$notice->id}}">
                                    <i class="md-icon material-icons">&#xE872;</i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Add Publication plus sign -->

                <div class="md-fab-wrapper Publication-create">
                    <a id="add_Publication_name_button" href="{{ route('notice_create') }}"  class="md-fab md-fab-accent Publication-create">
                        <i class="material-icons">&#xE145;</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <!--  -->
    <script type="text/javascript">
    $('.confirm').click(function(){
        var id = $('.confirm_id', $(this)).val();
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function() {
            window.location.href = "/notice/delete/"+id;
        })
    });
</script>

@endsection