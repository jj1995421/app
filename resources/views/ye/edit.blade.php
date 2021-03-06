@extends('layout.index')

@section('content')
<script type="text/javascript" charset="utf-8" src="/ad/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ad/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/ad/ueditor/lang/zh-cn/zh-cn.js"></script>
<div class="mws-panel grid_8">
<div class="mws-panel-header">
	<span>文章修改</span>
</div>
<div class="mws-panel-body no-padding">
 @if (count($errors) > 0)
<div class="mws-form-message error">
		<ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
</div>
@endif
	<form class="mws-form" action="{{url('admin/ye/updata')}}" method="post" enctype="multipart/form-data">
		<div class="mws-form-inline">
			<div class="mws-form-row">
				<label class="mws-form-label">文章标题</label>
				<div class="mws-form-item">
					<input type="text" class="small" value="{{$article['title']}}" name="title">
				</div>
			</div>

			<div class="mws-form-row">
				<label class="mws-form-label">文章分类</label>
				<div class="mws-form-item">
					<select class="small" name="ycate_id">
						<option value="0">请选择</option>
						@foreach($cates as $k=>$v)
						<option value="{{$v['id']}}"@if($article['ycate_id'] ==$v['id'])
						selected 
						
						@endif
						>{{$v['name']}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="mws-form-row">
				<label class="mws-form-label">文章内容</label>
				<div class="mws-form-item">
    <script id="editor" name="content" type="text/plain" style="width:800px;height:500px;">{!!$article['content']!!}</script>
				</div>
			</div>

		<div class="mws-button-row">
			{{csrf_field()}}
			<input type="hidden" name="id" value="{{$article['id']}}">
			<input type="submit" value="更新" class="btn btn-danger">
			<input type="reset" value="重置" class="btn ">
		</div>
	</form>
	<script type="text/javascript">
    var ue = UE.getEditor('editor');
	</script>
</div>    	
</div>
@endsection