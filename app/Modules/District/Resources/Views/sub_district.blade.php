@extends('layouts.admin_master2')

@section('title', "Sub-District")

@section('content')
<div id="page_content">
        <div id="page_content_inner">

            <h3 class="heading_b uk-margin-bottom">Sub-District</h3>
            @include('partials.flash_message')
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-overflow-container uk-margin-bottom">
                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                        <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="dt_tableExport">
                            <thead>
                                <tr>
                                    <th data-priority="critical">ID</th>
                                    <th data-priority="critical">Name</th>
                                    <th data-priority="critical">নাম</th>
                                    <th data-priority="1">Created at</th>
                                    <th data-priority="1">Updated at</th>
                                    <th class="filter-false remove sorter-false uk-text-center" data-priority="1">Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>নাম</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th class="uk-text-center">Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php $i=1; ?>
                            @foreach($sub_districts as $sub_district)
                                <tr>
                                    <td> <?php echo $i++; ?> </td>
                                    <td>{{ $sub_district->sub_district_name}}</td>
                                    <td>{{ $sub_district->b_sub_district_name}}</td>
                                    <td>{{ $sub_district->created_at}}</td>
                                    <td>{{ $sub_district->updated_at}}</td>
                                    <td class="uk-text-center">
                                        <!--<a href="{{ url('/district/sub-district/view'.'/'.$sub_district->id) }}" ><i class="md-icon material-icons uk-margin-right ">&#xE8F4;</i></a>-->
                                        <a href="{{ url('/district/sub-district/edit'.'/'.$sub_district->id) }}" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                        <a class="confirm">
                                            <input class="confirm_id" type="hidden" name="id" value="{{$sub_district->id}}"> 
                                        <i class="md-icon material-icons">&#xE872;</i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Add District plus sign -->

                    <div class="md-fab-wrapper branch-create">
                        <a id="add_branch_button" href="{{ url('/district/sub-district/add') }}" class="md-fab md-fab-accent branch-create">
                            <i class="material-icons">&#xE145;</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
@section('script')
    <!-- -->
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
            window.location.href = "/district/sub-district/delete/"+id;
        })
    });
</script>

@endsection