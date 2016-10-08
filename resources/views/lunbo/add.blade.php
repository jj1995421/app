@extends('layout.index')	

@section('content')
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>图片添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                            	<!-- {{session('error')}} -->
                    	<form class="mws-form" action="/admin/lunbo/insert" method="post">
                            @if (count($errors) > 0)
                    		<div class="mws-form-message error">
                    				<ul>
							            @foreach ($errors->all() as $error)
							                <li>{{ $error }}</li>
							            @endforeach
							        </ul>
                            </div>

							@endif
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">标题</label>
                    				<div class="mws-form-item">
                    					<input type="text"  name="title" class="small">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">链接</label>
                    				<div class="mws-form-item">
                    					<input type="text" name="urls" class="small">
                    				</div>
                    			</div>

                    			<div class="mws-form-row">
                    				<label class="mws-form-label">图片</label>
                    				<div class="mws-form-item">
                    					<input type="file"  name="pic" class="small">
                    				</div>
                    			</div>
                    		</div>
                    		<div class="mws-button-row">
                    		{{csrf_field()}}
                    			<input type="submit" value="提交" class="btn btn-danger">
                    			<input type="reset" value="重置" class="btn ">
                    		</div>
                    	</form>
                    </div>    	
                </div>
@endsection