@extends('app')

@section('content')
	{{-- Informatio de l'utilisateur --}}
	<div class="panel panel-primary col-lg-8">
		<div class="panel-heading">
			<h3 class="panel-title">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				{{ Auth::user()->id }} {{ Auth::user()->name }} {{ Auth::user()->lastname }}
			</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-hover ">
				<thead>
					<tr>
						<th class="col-lg-2"><strong>id</strong></th>
						<th>{{Auth::user()->id}}</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="col-lg-2"><strong>nom</strong></td>
						<td>{{Auth::user()->name}}</td>
					</tr>
					<tr>
						<td class="col-lg-2"><strong>email</strong></td>
						<td>{{Auth::user()->email}}</td>
					</tr>
					<tr>
						<td class="col-lg-2"><strong>inscrit le</strong></td>
						<td>{{Auth::user()->created_at}}</td>
					</tr>
					<tr>
						<td class="col-lg-2"><strong>prénom</strong></td>
						<td>{{Auth::user()->firstname}}</td>
					</tr>
					<tr>
						<td class="col-lg-2"><strong>nom</strong></td>
						<td>{{Auth::user()->lastname}}</td>
					</tr>
					<tr>
						<td class="col-lg-2"><strong>date de naissance</strong></td>
						<td>{{Auth::user()->birthday_date}}</td>
					</tr>
					<tr>
						<td class="col-lg-2"><strong>rôle</strong></td>
						<td>{{Auth::user()->role->slug}}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	{{-- Actions --}}
	<div class="col-lg-4">
		<a href="" class="btn btprimary">Voir son formulaire</a>
		<a href="" class="btn btprimary btn-success">Lui ajouter/retirer des points</a>
	</div>
@endsection