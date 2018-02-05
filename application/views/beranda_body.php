<body>

    <nav role="navigation">
      <div class="container">
        <div class="nav-wrapper">
          <ul class="right">
            <li><a class="modal-trigger" href="#">
                Sistem Informasi Geografis
            </a></li>
          </ul>
        </div>
      </div> 
    </nav>

    <div class="section section__hero" id="index-banner">
      <div class="container">
        <div class="row">
          <div class="col s12 m7">
            <h1 class="header">Sentiment Web</h1>
            <h3 class="header">Made with <i class="material-icons">favorite</i></h3>
            <h5 class="header">We <i class="material-icons">favorite</i> full sesi</h5> 
          </div>
          <div class="col s12 m5 gorilla"> </div>
        </div>
        <div class="row center">
            <br><br><br><br>
        </div>
      </div>
    </div>
	
	<div id="map"></div>

	<div class="section section__hero" id="index-banner" style="margin-top: 650px">
      <div class="container">
      	<h1 class="header center">About Us</h2>
        <div class="row">
        	<div class="col s6 m6 l3 center">
		        <div class="card-panel grey lighten-5 z-depth-1">
		        	<img src="<?php echo base_url();?>assets/images/fachruddin.jpg" class="circle responsive-img"> 
		        	<span>Facruddin Mansyur</span>
		        </div>
		    </div>
        	<div class="col s6 m6 l3 center">
		        <div class="card-panel grey lighten-5 z-depth-1">
		        	<img src="<?php echo base_url();?>assets/images/fawcet.jpg" class="circle responsive-img"> 
		        	<span>Fawcet Jenusdy Makay</span>
		        </div>
		    </div>
        	<div class="col s6 m6 l3 center">
		        <div class="card-panel grey lighten-5 z-depth-1">
		        	<img src="<?php echo base_url();?>assets/images/silvia.jpg" class="circle responsive-img"> 
		        	<span>Silvia Ni'matul Maula</span>
		        </div>
		    </div>
        	<div class="col s6 m6 l3 center">
		        <div class="card-panel grey lighten-5 z-depth-1">
		        	<img src="<?php echo base_url();?>assets/images/yus.jpg" class="circle responsive-img"> 
		        	<span>Yustiar Adinugroho</span>
		        </div>
		    </div>
     	</div>
      </div>
    </div>
	

	<div class="fixed-action-btn horizontal click-to-toggle" style="z-index: 9999">
		<a class="btn-floating btn-large red">
			<i class="material-icons">menu</i>
		</a>
		<ul>
			<li onclick="getBahagia()"><a class="btn-floating red"><i class="material-icons">sentiment_satisfied</i></a></li>
			<li onclick="getNetral()"><a class="btn-floating yellow darken-1"><i class="material-icons">sentiment_neutral</i></a></li>
			<li onclick="getSedih()"><a class="btn-floating green"><i class="material-icons">sentiment_very_dissatisfied</i></a></li>
			<li onclick="getAll()"><a class="btn-floating blue"><i class="material-icons">select_all</i></a></li>
		</ul>
	</div>

