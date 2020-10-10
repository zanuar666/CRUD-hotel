<div class="modal-dialog modal-md">
    <div class="modal-content">
        <form id="frmEdit" action="{{ url()->current() . '/process' }}" method="POST" autocomplete="off">
            {{ csrf_field() }}
            <input type="hidden" name="id_transaksi" value="{{ $transaksi->id_transaksi }}">
            <div class="modal-header">
                <h5 class="modal-title">Edit</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Resepsionis</label>
                    <select name="id_resepsionis" class="form-control">
                        @foreach($resepsionis as $key => $value)
                        <option value="{{ $value->id_resepsionis }}" {{ $value->id_resepsionis == $transaksi->id_resepsionis ? 'selected' : null }}>{{ $value->nma_resepsionis }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Nama Pengunjung</label>
                    <select name="id_pengunjung" class="form-control">
                        @foreach($pengunjung as $key => $value)
                        <option value="{{ $value->id_pengunjung }}" {{ $value->id_pengunjung == $transaksi->id_pengunjung ? 'selected' : null }}>{{ $value->nma_pengunjung }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Jumlah Kamar</label>
                    <input type="text" name="jml_kmr" class="form-control" value="{{ $transaksi->jumlah_kamar }}">
                </div>

                <div class="form-group">
                    <label>Jumlah Harga</label>
                    <input type="text" name="jml_hrg" class="form-control" value="{{ $transaksi->total_harga }}">
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>
<script>
    $('#frmEdit').submit(function(e){
        e.preventDefault();

        let formData = new FormData(this);
        
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
                if(response.RESULT == 'OK'){
                    alert(response.MESSAGE);

                    setTimeout(function(){
                        window.location.reload();
                    }, 1000);
                }else{
                    alert(response.MESSAGE);
                }
            }
        }).fail(function(){
            alert('Error');
        });
    });
</script>