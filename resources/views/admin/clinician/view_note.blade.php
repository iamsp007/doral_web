<div class="modal-dialog">
    <div class="modal-content" >
        <div class="modal-header">
            
            <h4 class="modal-title"><span class="semi-bold">Note</span></h4>   
            <button type="button" class="close" data-dismiss="modal">&times;</button>
             <div class="error"></div>
        </div>
        <div class="modal-body">
           <p class="notification_message">
           	
        		@foreach($notes as $note)
		        	 {!! $note !!}  </br> </br>
				
        		@endforeach
        	
               
           </p>
        </div>
    </div>
</div>   
    
