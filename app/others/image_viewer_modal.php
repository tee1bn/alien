


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
        <button type="button" class="close " id="modal-closer" data-dismiss="modal">&times;</button>
        <i class="fa fa-chevron-left img-nexter-left  img-nexter fa-3x" ng-click="file_previewer.back()"></i>
        <i class="fa fa-chevron-right img-nexter-right img-nexter  fa-3x" ng-click="file_previewer.next()"></i>
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content gallery-modal-body">
      <div class="modal-body" style="    padding: 20% 0;">
          <p>
      <img src="<?=asset;?>/images/bg-02.jpg" class="gallery-img">
Some text in the modal
      </p>

      </div>
     
    </div>

  </div>
</div>

			</section>

<style>
	#myModal{
    z-index: 999999;
   background-color: rgb(0, 0, 0, 0.9) !important;
}
.gallery-modal-body{

    background: none ;
    text-align: center;
}

#modal-closer {
    background: white;
    padding: 10px;
    border-radius: 172px;

    }



    .img-nexter:hover{
	color: white;
	cursor: pointer;
    }

    .img-nexter{
    position: absolute;
    top: 50%;    
    z-index: 99999999;
}
.img-nexter-left{
	left: 0px;
    }

    .img-nexter-right{
	right: 0px;


    }


</style>	


<!-- image viewer modal ends -->