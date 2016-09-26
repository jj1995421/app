@extends('layout.index')

@section('content')
<div class="mws-panel grid_8">
  <div class="mws-panel-header">
    <span>
      <i class="icon-table"></i>分类列表</span>
  </div>
  <div class="mws-panel-body no-padding">
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
      <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
        <thead>
          <tr role="row">
            <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 212px;">ID</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 278px;">分类名称</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 260px;">分类路径</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 142px;">操作</th></tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
          @foreach($cates as $k=>$v)
          <tr class="@if($k%2 ==0)
          even
          @else
          odd
          @endif
          ">
          <!-- 这里分配变量到模板 -->
            <td class=" sorting_1">{{$v['id']}}</td>
            <td class=" ">{{$v['name']}}</td>
            <td class=" ">{{$v['path']}}</td>
            <td class=" ">&nbsp;&nbsp;&nbsp;
            <a href="/admin/ycate/add/{{$v['id']}}"  style="color:black;font-size:16px;"><i class="icon-plus"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="/admin/ycate/edit/{{$v['id']}}"  style="color:black;font-size:16px;"><i class="icon-pencil"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="/admin/ycate/delete/{{$v['id']}}" style="color:black;font-size:16px;"><i class="icon-remove"></i></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
  </div>
</div>
@endsection