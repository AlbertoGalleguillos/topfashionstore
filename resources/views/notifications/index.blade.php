@extends('layouts.master')

@section('content')
	<!--tab start-->
	<div class="container-fluid inbox">
		<!-- Title -->
		<div class="col s8">
			<h1 class="section-title" id="services">
				<span>Mis Notificaciones</span>
			</h1><!-- End Title -->
		</div>

		<div class="section" id="inbox"> 
			<!-- section content start-->
			<div class="section-inner">
				<div class="row">
					<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
						<div class="mailbox">
							<div class="card-panel">
								<table class="highlight">
									<thead>
										<tr>
											<th class="center-align">Descripción</th>
										</tr>
									</thead>
									<tbody>
										@if ($notifications->isempty())
											<tr>
												<td class="center-align">{{ $message }}</td>
											</tr>
										@else
											@foreach($notifications as $notification)
												<tr>
													<td class="center-align">
														<form method="POST" action="/notifications/{{ $notification->id }}">
				    		                                {{ csrf_field() }}
															<button class="btn-flat" type="submit" formaction="/notifications/{{ $notification->id }}">
																@unless ($notification->read ) <b> @endunless
																	{{ $notification->body }}
																@unless ($notification->read ) </b> @endunless
															</button>
                                						</from>
														{{--<a href="{{ $notification->url }}">
															@unless ($notification->read ) <b> @endunless
																{{ $notification->body }}
															@unless ($notification->read ) </b> @endunless
														</a>--}}
													</td>
												</tr>
											@endforeach
										@endif
									</tbody>
								</table>
								</div>
						</div>
					</div>
				</div>
			</div> <!-- section content end -->  
		</div>
	</div><!-- tab end -->
@endsection