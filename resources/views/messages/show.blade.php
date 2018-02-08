@extends('layout')

@section('content')
	<!--tab start-->
	<div class="container-fluid full-width-container inbox">
		<!-- Title -->
		<h1 class="section-title" id="services">
			<span>Mensajes</span>
		</h1><!-- End Title -->
	
		<!--breadcrum start-->
		<ol class="breadcrumb text-left">
          <li><a href="/messages/inbox">Mensajes</a></li>
          <li class="active">{{ $message->id }}</li>
		</ol><!--breadcrum end-->
	
		<div class="section" id="inbox"> 

				<!-- section content start-->
				<div class="section-inner">
					<div class="row">
						<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                        	<div class="mailbox">
                        		<div class="tab-content"> 
									<div role="tabpanel" class="tab-pane active" id="inbox">
										<ul class="list-group pmd-z-depth pmd-list-twoline card-wp">
    										<li class="list-group-item unread">
												<div class="row">
													<span class="col l2 m2 s2 avatar-list-img40x40"><img alt="40x40" class="img-responsive" src="/images/avatar-icon-40x40.png" data-holder-rendered="true"></span>  
													
													<div class="col l7 m7 avtar-detail">
														<ul>
															<li>De: {{ $message->user->name }}</li>
															<li>Para: {{ $message->getRecipients() }}</li>
														</ul>
													</div>
													<span class="col l3 m3 offset-s10 ate-time right-align">{{ $message->created_at->format('l j F Y, h:i:s A') }}</span>		

                                                    <br>
															<div class="avtar-detail">
																
															</div>
													<div class="media-right media-top">
														
													</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item unread">
												<div class="media-body media-middle">
													<div class="message-detail">
														<h3 class="list-group-item-heading">Asunto: {{ $message->subject }}</h3>
													</div>
												</div>
												
                                            </li>
                                            <li class="list-group-item unread">
												<div class="media-body media-middle">
													<div class="message-detail">
														<h3 class="list-group-item-heading"><span>{{ $message->body }}</span></h3>
													</div>
												</div>
											</li>
											@if(count($message->attachments))
											<li class="list-group-item unread">
												<div class="media-body media-middle">
													@foreach($message->attachments as $attach)
													<div class="message-detail">
														<h3 class="list-group-item-heading">
															<span>
																<a href="../../{{ $attach->filepath }}" target="_blank">
																	{{ $attach->filename }}
																</a>															
															</span>
														</h3>
													</div>
													@endforeach
												</div>
											</li>
											@endif
										</ul>
									</div>
									<!-- Inbox -->
								 </div>
                   			</div>
             		 	</div>
					</div>
				</div> <!-- section content end -->  
			</div>
	</div><!-- tab end -->
	
	<div class="container center-align">
		<form method="GET" action="/messages/create/{{$message->getRecipients()}}/{{$message->subject}}">
			{{ csrf_field() }}
			<button class="waves-effect waves-light btn btn-reply blue" type="submit" formaction="/messages/create/{{$message->user->name}}/RE: {{$message->subject}}">
				<i class="material-icons left">reply</i>Contestar
			</button>
		</from>
		<form method="GET" action="/messages/create/{{$message->getRecipients()}}/{{$message->subject}}">
			{{ csrf_field() }}
			<button class="waves-effect waves-light btn btn-reply blue" type="submit" formaction="/messages/create/{{$message->user->name}}, {{$message->getRecipients()}}/RE: {{$message->subject}}">
				<i class="material-icons left">reply_all</i>Contestar a Todos
			</button>
		</from>
	</div>
@endsection