var oFilter;

arel.sceneReady(function()
{
	//Just for Debuging purposes
	//arel.Debug.activate();
	//arel.Debug.deactivateArelLogStream();
	
	oFilter = new ArelFilter();
});

function ArelFilter()
{
	//array to keep all objects -> used for local filtering
	this.allObjects = undefined;
	
	this.distance = 0;
	
	this.init = function()
	{
		var that = this;
		
		try
		{
			//get all objects (we will need them for the local search)
			this.allObjects = arel.Scene.getObjects();	

			//init GUI stuff
			$('#searchlocal').keypress(function(e) { return that.keyControl(e); });		
			$('#filter').change(function() { that.filterServer($('#filter').val()); return true; });
			
			$('#create').click(function() { that.addPOIServer(); return true; });

			$('#delete').click(function() { that.deletePOIServer(); return true; });

			$('#addMulti').click(function() { 
				that.addMultimediaToPoiServer();
	
			return true;});

			$('.filterbuttonArea a.filterButton').click(function() {
				$('.filterOptionsInner').slideToggle(900);				
		    	});	
		//	$('.cancel').click(function() { this.hide(); return true;});		
		}
		catch(e)
		{
			arel.Debug.error(e);
		}
	};
	//local search
	this.searchLocally = function(term)
	{
		try
		{
			//remove all objects that are not found
			for(var i in this.allObjects)
			{
				if(this.allObjects[i] instanceof arel.Object)
				{
					//check if the search term is in the title -> remove the poi if not
					if(this.allObjects[i].getTitle().toLowerCase().indexOf(term.toLowerCase()) === -1)
						arel.Scene.removeObject(this.allObjects[i]);
					else if(!arel.Scene.objectExists(this.allObjects[i]))
						arel.Scene.addObject(this.allObjects[i]);					
				}
			}
		}
		catch(e)
		{
			arel.Debug.error(e);
		}
		
	};
	
	this.handleLocation = function(lla)
	{
		try
		{
			arel.Debug.log(lla);
			var that = this;
			
			if(this.startLLA === undefined)
				this.startLLA = lla;
			else
			{
				//get the distance form the last know point to this one
				this.distance += Math.round(arel.Util.getDistanceBetweenLocationsInMeter(this.startLLA, lla));
				
				//store the new point
				this.startLLA = lla;
				
				$('.info').html("distance since start:<br />" + this.distance + "m");
			}			
		}catch(e)
		{
			arel.Debug.error(e);
		}
	};
	
	this.filterServer = function(val)
	{
		//arel.Debug.log(val);
		
		//hide the selector again
		$('#filter').blur();
		
		//make a request to the server
		arel.Scene.triggerServerCall(true, {"filter_value" : val, "filter_filtered": "true"}, false);		
	};

	this.addPOIServer = function()
	{
		//arel.Debug.log(val);
		
		//make a request to the server

		var nombre = $("#nombre").val();
		var descripcion = $("#descripcion").val(); 
		var multimedia = $('input[name=multimedia]:checked').val();
		var contenido_multimedia = $("#inputContent").val();		
		var categorias_string = "";

		for(var i = 0; i < categorias.length; i++) {
			categorias_string = categorias_string + "," + categorias[i];			
		}

		arel.Scene.triggerServerCall(true, {"filter_operation" : "add", "filter_nombre": nombre, "filter_descripcion" : descripcion, 
		"filter_multimedia" : multimedia ,"filter_contenido_multimedia" : contenido_multimedia, "filter_categorias" : categorias_string}, false);		
	};

	this.deletePOIServer = function()
	{
		//arel.Debug.log(val);
		
		//make a request to the server

		var poi_id = $("#delete_poi").val();

		arel.Scene.triggerServerCall(true, {"filter_operation" : "delete", "filter_poi_id": poi_id}, false);		
	};
	
	this.addMultimediaToPoiServer = function()
	{
		var poi_id = $("#poi").val();
		var tipo = $('input[name=tipo]:checked').val();
		var contenido = $("#contenidoMultimediaPOI").val();

		arel.Scene.triggerServerCall(true,{"filter_id_poi": poi_id, "filter_tipo": tipo, "filter_operation" : "addMulti", "filter_multimedia": contenido},false);

	}

	this.keyControl = function(oEvent) {
		
		var keycode;
		
		if (window.event) {
			keycode = window.event.keyCode;
		} else if (oEvent) {
			keycode = oEvent.which;
		} else {
			return true;
		}
		
		if (keycode == 13) 
		{
			//make sure the iPhone keyboard disappears on pressing go
			$('#searchlocal').blur();						
			
			//do the search
			this.searchLocally($('#searchlocal').val());			
				
			return false;
		} else {
			return true;
		}
	};
	
	this.init();
}
