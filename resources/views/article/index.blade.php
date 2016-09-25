@extends('layout.index')

@section('content')
<div class="mws-panel grid_8">
  <div class="mws-panel-header">
    <span>
      <i class="icon-table"></i>文章列表</span>
  </div>
  <div class="mws-panel-body no-padding">
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
    <form action="/admin/article/index" method="get">
      <div id="DataTables_Table_1_length" class="dataTables_length">
        <label>显示
          <select size="1" name="num" aria-controls="DataTables_Table_1">
            <option value="5" @if(!empty($request['num']) && $request['num']==5)
                selected 
            @endif
            >5</option>
            <option value="10" @if(!empty($request['num']) && $request['num']==10)
                selected 
            @endif>10</option>
            <option value="15" @if(!empty($request['num']) && $request['num']==15)
                selected 
            @endif>15</option>
            <option value="20"@if(!empty($request['num']) && $request['num']==20)
                selected 
            @endif>20</option></select>条</label>
      </div>
      <div class="dataTables_filter" id="DataTables_Table_1_filter">
        <label>关键字:
          <input value="{{$request['keywords'] or ''}}" type="text"  name="keywords" ><button class="btn btn-primary">搜索</button></label></div>
          </form>
      <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
        <thead>
          <tr role="row">
            <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 212px;">ID</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 278px;">文章标题</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 260px;">文章描述</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 187px;">文章主图</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 142px;">操作</th></tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach($articles as $k=>$v)
          <tr class="@if($k%2 ==0)
                    even
                    @else
                    odd
                    @endif
          ">
            <td class=" sorting_1">{{$v['id']}}</td>
            <td class=" ">{{$v['title']}}</td>
            <td class=" ">{{$v['descript']}}</td>
            <td class=" "><img src="{{$v['pic']}}" width="100" alt=""></td>
            <td class=" ">&nbsp;&nbsp;&nbsp;<a href="/admin/article/edit/{{$v['id']}}"  style="color:black;font-size:16px;"><i class="icon-pencil"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <a href="/admin/article/delete/{{$v['id']}}" style="color:black;font-size:16px;"><i class="icon-remove"></i></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="dataTables_paginate paging_full_numbers" id="pages">
      {!!$articles->appends($request)->render()!!}
    </div>
  </div>
</div>
@endsection