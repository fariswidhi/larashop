
	$(document).ready(function(){
		$(".btn-nav").click(function(){
			$(".nav").toggleClass("toLeft");
			$(".main").toggleClass('MainToLeft');
		});
$("th:last").after("<th>Option</th>");
      var url = window.location.pathname;
      var url2 = url.substr(url.lastIndexOf('/') + 1);
      // if url not number
      if (isNaN(url2)) {
        fetch();
      }


      function fetch(id =null){
        var uri;
        if(id!=null){
           uri = '?page='+id;
        }
        else{
           uri = '?page=1';
        }
      var thCount = $("table thead th" ).length;
      var url = window.location.pathname;
      var url2 = url.substr(url.lastIndexOf('/') + 1);

       $.ajax({
            url: url2+'/json'+uri,
            type: 'POST',
            dataType: 'json',
            success: function(d){
            var html = '';


            if (d.count != 0) {
              for (var i = 0; i < d.data.length; i++) {
              html += "<tr>";
                for (var s = 1; s < d.count; s++) {
                    html += '<td>'+d.data[i][s]+'</td>';
                }


                html  += '<td>';
                if (url2 == 'booking-module') {
                html += '<a href='+url2+'/'+d.data[i][0]+'><button class="btn btn-success">Show</button></a>';                  
                }
                html += '<a href='+url2+'/'+d.data[i][0]+'/edit><button class="btn btn-warning">Edit</button></a>';
                html += ' <button data-paging='+d.page+'  data-id='+d.data[i][0]+' class="btn btn-danger btn-delete">Delete</button>';
                html += '</td>';
                }

                html += "</tr>";


                var count;
                $(".btn-previous").data('id',d.page);

                if ($(".btn-previous").data('id')==1 || d.max==0 || d.count == 0) {
                  $(".btn-previous").attr('disabled','disabled');
                }

                if($(".btn-previous").data('id') > 1){
                  $(".btn-previous").removeAttr('disabled');
                }

                if ($(".btn-next").data('id') == d.max-1 || $(".btn-next").data('id') != 0) {
                  $(".btn-next").attr('disabled','disabled');
                  // alert($('.btn-next').data('id'));
                }else{
                  $(".btn-next").removeAttr('disabled');
                }

                $(".btn-next").data('id',d.page);


            }

            else{
              $(".btn-previous").attr('disabled','disabled');
              $(".btn-next").attr('disabled','disabled');
              html += "<tr>";
              html += "<td colspan="+thCount+"><center>"+d.data+"</center></td>";
              html += "</tr>";
            }
              $(".tbody").html(html);
          }
        });
      }

    $(document).on('click','.btn-delete',function(){
      var id = $(this).data('id');
      var paging =$(this).data('paging');
      $.ajax({
        url: url2+'/'+id,
        type: 'DELETE',
        success: function(){
          fetch(paging);
        }
      });
    });


       $(document).on('click','.btn-previous',function(){
        var id = $(this).data('id');
        fetch(id-1);

      });


        $(document).on('click','.btn-next',function(){
        var id = $(this).data('id');
        fetch(id+1);
      });
	});





