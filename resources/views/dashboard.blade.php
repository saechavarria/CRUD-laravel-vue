@extends('app')
@section('content')

<div id="crud" class="row">
	<div class="col-xl-12">
		
	</div>

	<div class="col-sm-7">
		<h1 class="page-header">CRUD Laravel y VUE</h1>
		<a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#create">Nueva Tarea</a>
		
		<table class="table table-hover table-striped">

			<thead>
				<tr>
					<th>ID</th>
					<th>Tarea</th>
					<th colspan="2">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="keep in keeps">
					<td width="10px">@{{ keep.id }}</td>
					<td>@{{ keep.keep }}</td>
					<td width="10px">
						<a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editKeep(keep)">Editar</a>
					</td>
					<td width="10px">
						<a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="deleteKeep(keep)">Eliminar</a>
					</td>
				</tr>
			</tbody>
		</table>

		<nav aria-label="Page navigation example"> 
			<ul class="pagination">
				<li class="page-item" v-if="pagination.current_page > 1">
					<a class="page-link" href="#" @click.prevent="changePage(pagination.current_page - 1)">
						<span>Atras</span>
					</a>
				</li>

				<li class="page-item" v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
					<a  class="page-link"href="#" @click.prevent="changePage(page)">
						@{{ page }}
					</a>
				</li>

				<li class="page-item" v-if="pagination.current_page < pagination.last_page">
					<a class="page-link" href="#" @click.prevent="changePage(pagination.current_page + 1)">
						<span>Siguiente</span>
					</a>
				</li>
			</ul>
		</nav>

		@include('create')	
		@include('edit')	
	</div>
	<div class="col-sm-5">
		<pre>
			@{{ $data }}
		</pre>
	</div>
</div>

@endsection