@extends('layouts.admin_master2')

@section('title', 'Doctors Panel')

@section('content')
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Doctors Panel</h3>

        @include('partials.flash_message')
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-overflow-container uk-margin-bottom">
                    <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                    <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="dt_tableExport">
                        <thead>
                            <tr>
                                <th data-priority="critical">Id</th>
                                <th data-priority="critical">Name</th>
                                <th data-priority="critical">Speciality</th>
                                <th data-priority="critical">District</th>
                                <th data-priority="critical">Sub-District</th>
                                <th data-priority="2">Created at</th>
                                <th data-priority="2">Updated at</th>
                                <th class="filter-false remove sorter-false uk-text-center" data-priority="1">Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Speciality</th>
                                <th>District</th>
                                <th>Sub-District</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th class="uk-text-center">Actions</th>
                            </tr>
                        </tfoot>
                        
                        <?php $i=1;?>
                        <tbody>
                            @foreach($medical_specialists as $medical_specialist)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $medical_specialist['medical_specialist_name'] }}</td>
                                    <td>{{ $medical_specialist['medical_specialist_subname'] }}</td>
                                    <td>{{ $medical_specialist['district_name'] }}</td>
                                    <td>{{ $medical_specialist['sub_district_name'] }}</td>
                                    <td>{{ $medical_specialist['created_at'] }}</td>
                                    <td>{{ $medical_specialist['updated_at'] }}</td>
                                    <td class="uk-text-center">
                                        <!--<a href="{{ url('medical-specialist/view'.'/'.$medical_specialist['id'] )}}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE8F4;</i></a>-->
                                        <a href="{{ url('medical-specialist/edit/info'.'/'.$medical_specialist['id'] )}}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                        <a class="confirm">
                                            <input class="confirm_id" type="hidden" name="id" value="{{$medical_specialist['id'] }}">
                                        <i class="md-icon material-icons">&#xE872;</i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Add Publication plus sign -->

                <div class="md-fab-wrapper Publication-create">
                    <a id="add_Publication_name_button" href="{{ url('medical-specialist/add') }}"  class="md-fab md-fab-accent Publication-create">
                        <i class="material-icons">&#xE145;</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
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
            window.location.href = "/medical-specialist/delete/"+id;
        })
    });
</script>

@endsection