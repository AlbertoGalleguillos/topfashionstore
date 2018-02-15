@extends('layout')

@section('content')
	<!--tab start-->
	<div class="container-fluid  inbox">
		<!-- Title -->
		<h1 class="section-title" id="services">
			<span>Mensajes Recibidos</span>
		</h1><!-- End Title -->
	
		<div class="container-fluid row">
			<div class="col s6">
				<!--breadcrum start-->
				<ol class="breadcrumb text-left">
				<li><a href="/messages">Mensajes</a></li>
				<li class="active">Bandeja de Entrada</li>
				</ol><!--breadcrum end-->
			</div>
			<div class="col s6 right-align">
				<a class="btn waves-effect waves-light blue lighten-1" href="/messages/sent">Enviados</a>
				&nbsp;
				<a class="btn waves-effect waves-light blue lighten-1" href="/messages/trash">Papelera</a>
			</div>
		</div>

		<div class="section" id="inbox"> 
						
				<!-- section content start-->
				<div class="section-inner">
					<div class="row">
						<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                        	<div class="mailbox">
                    	  		<div class="action-bar row">
                        			<div class="col-lg-6 col-xs-4">
										<span class="checkbox pull-left">
											<label class="pmd-checkbox checkbox-pmd-ripple-effect">
												<input type="checkbox" value="">
											</label>
										</span>
                                		<a href="javascript:void(0);" class="btn-link pmd-ripple-effect btn-delete pull-left">
											<i class="material-icons md-dark pmd-sm">delete</i>
										</a>
                            		</div>
									<div class="col-lg-6 col-xs-8">
										<div class="form-group icon-right">
											<div class="floatinglabels pmd-textfield">
												<input type="text" placeholder="Buscar..." class="form-control">
												<span class="dic dic-search">&nbsp;</span>
											</div>
										</div>
									</div>
                        		</div>
								
                        		<div class="tab-content"> 
									<div role="tabpanel" class="tab-pane active" id="inbox">
										<ul class="list-group pmd-z-depth pmd-list-twoline card-wp">
                                            @foreach ($messages as $message)
												<li class="list-group-item unread">
													<a href="/messages/{{ $message->id }}">
													<div class="media-left media-check">
														<span class="checkbox">
															<label class="pmd-checkbox checkbox-pmd-ripple-effect">
																<input type="checkbox" value="">
															</label>
														</span>
													</div>
													<div class="media-left user-details">
														<span class="avatar-list-img40x40"><img alt="40x40" class="img-responsive" src="/images/avatar-icon-40x40.png" data-holder-rendered="true"></span>  
														<div class="avatar-detail">
															<h3 class="list-group-item-heading">{{ $message->from }}</h3>
														</div>
													</div>
													<div class="media-body media-middle">
														<div class="message-detail">
															<h3 class="list-group-item-heading">{!! $message->subject !!}&nbsp;<span> - {{ $message->body }}</span></h3>
														</div>
													</div>
													<div class="media-right media-top">
														<span class="date-time">{{ Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</span>
													</div>
													</a>
												</li>
                                            @endforeach    
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
	
	<div class="fixed-action-btn">
		<a href="/messages/create" class="btn-floating btn-large waves-effect waves-light blue lighten-1"><i class="material-icons">create</i></a>
	</div> 
@endsection