@extends('layout.index')	

@section('content')
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>用户修改</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                            	<!-- {{session('error')}} -->
                    	<form class="mws-form" action="/admin/user/update" method="post">
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
                    				<label class="mws-form-label">用户名</label>
                    				<div class="mws-form-item">
<<<<<<< HEAD
                    					<input type="text" value="{{$userInfo->username}}" name="username" class="small">
=======
                    					<input type="text" value="{{$userInfo['username']}}" name="username" class="small">
>>>>>>> b4f9e5ada2715e0b4391c95dcab71fa699c6bc7d
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">邮箱</label>
                    				<div class="mws-form-item">
<<<<<<< HEAD
                    					<input type="text" value="{{$userInfo->email}}" name="email" class="small">
=======
                    					<input type="text" value="{{$userInfo['email']}}" name="email" class="small">
>>>>>>> b4f9e5ada2715e0b4391c95dcab71fa699c6bc7d
                    				</div>
                    			</div>
                    		</div>
                    		<div class="mws-button-row">
                    		{{csrf_field()}}
<<<<<<< HEAD
                                <input type="hidden" name="ID" value="{{$userInfo->ID}}">
=======
                                <input type="hidden" name="ID" value="{{$userInfo['ID']}}">
>>>>>>> b4f9e5ada2715e0b4391c95dcab71fa699c6bc7d
                    			<input type="submit" value="修改" class="btn btn-danger">
                    			<input type="reset" value="重置" class="btn ">
                    		</div>
                    	</form>
                    </div>    	
                </div>
@endsection