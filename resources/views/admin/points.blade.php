{{-- Vue pour gérer les points d'un utilisateur, ajouter, supprimer, modifier --}}

@extends('app')

@section('content')
	<h1>Tableau des points</h1>
	<p>{{$user->name}}, <small>inscrit depuis {{$user->created_at}}</small></p>

	<div class="col-md-6">
		<blockquote><h1 class="text-success">{{$user->points->total_points}} <small>points acquis</small></h1></blockquote>
	</div>
	<div class="col-md-6">
		<blockquote><h1 class="text-primary">{{$user->points->pending_points}} <small>points en attente</small></h1></blockquote>
	</div>

	{!! Form::model($user, ['class' => 'form-horizontal', 'route'=>'admin.user.update']) !!}

	<div class="form-group">
		<label class="col-lg-2 control-label">Ajouter des points</label>
		<div class="col-md-6">
			<!-- {!! Form::text('name', null, ['class' => 'form-control']) !!} -->
			{!! Form::text('points[total_points]', null, ['class' => 'form-control']) !!}
		</div>
		<div class="col-md-2"><a href="#" class="btn btn-primary" id="add">+</a></div>
	</div>

	<div class="form-group">
		<label class="col-lg-2 control-label">Retirer des points</label>
		<div class="col-md-6">
			{!! Form::text('remove', null, ['class' => 'form-control', 'placeholder' => 'Supprimer des points']) !!}
		</div>
		<div class="col-md-2"><a href="#" class="btn btn-danger" id="remove">-</a></div>
	</div>

	{!! Form::close() !!}

	<script type="text/javascript">var userId = '{{$user->id}}';</script>
@endsection