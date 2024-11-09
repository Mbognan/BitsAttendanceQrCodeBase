@extends('admin.layouts.master')
<link href="https://cdn.datatables.net/2.1.7/css/dataTables.tailwindcss.css">
@section('contents')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Payment Section</h2>
            {{-- <button class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-plus"></i>add item</button> --}}
        </div>
    </div>
</div>

<div class="row m-t-25">


    <div class="col-lg-12">
        <div class="table-data__tool">

        </div>
        <div class="card">
            <div class="card-body table-responsive">
                {{ $dataTable->table() }}
          </div>

        </div>
    </div>
</div>

@endsection

<div class="modal fade" id="mediumModal_2" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Create Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div class="col-lg-12   ">
                        <form action="" method="POST" class="form-horizontal">

                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <div class="input-group mb-6">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div class="form-control" id="user_name">Marjoe Frank Bacbac</div>
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-credit-card"></i>
                                        </div>
                                       <div class="form-control" id="student_id">21-0530-320</div>
                                    </div>
                                </div>
                                <input type="hidden" id="user_id" >
                                <div class="col col-md-12 mb-4">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                       <div class="form-control" id="email">pitad21.bacbacmarjoefrank@gmail.com</div>
                                    </div>
                                </div>
                                <div class="col col-md-6 mb-4">
                                    <div class="">
                                        <blockquote class="blockquote ">
                                            <p id="total_absent">Total Absent: 6</p>
                                            <p id="total_fines">Total Fines: 150</p>
                                            <p id="status">Status: <span class="badge badge-danger">Not Paid</span></p>
                                          </blockquote>

                                    </div>
                                </div>
                            </div>

                            {{-- <div class="row form-group">
                                <div class="col col-md-12">
                                    <div class="input-group">
                                        <input type="email" id="input2-group1" name="input2-group1" placeholder="Email" class="form-control">
                                        <div class="input-group-addon">
                                            <i class="far fa-envelope"></i>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                        </form>
                    </div>
                    <input type="hidden" value="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" id="mark-paid" class="btn btn-primary">Paid</button>
            </div>
        </form>
        </div>
    </div>
</div>
@push('scripts')

{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.7/js/dataTables.tailwindcss.js"></script>
<script>
   $(document).on('click', '.edit-payment', function() {
    var userId = $(this).data('id');

    $.ajax({
        url: '/officer/get-payment-info/' + userId,
        method: 'GET',
        success: function(data) {
            $('#user_name').text(data.first_name + ' ' + (data.middle_name || '') + ' ' + data.last_name);
            $('#student_id').text(data.student_id);
            $('#email').text(data.email);
            $('#total_absent').text("Total Absent: " + data.absent_count);
            $('#user_id').val(data.userId); // Store userId in hidden input
            $('#total_fines').text("Total Fines: " + data.total_fine);
            $('#status').html("Status: " + (data.payment_status === 'Paid' ?
                '<span class="badge badge-success">Paid</span>' :
                '<span class="badge badge-danger">Not Paid</span>'));
        }
    });
});

$(document).on('click', '#mark-paid', function() {
    var userId = $('#user_id').val(); // Get userId from hidden input

    $.ajax({
        url: '/officer/payment-received/' + userId,
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}' // Include CSRF token for security
        },
        success: function(response) {
            if (response.success) {
                $('#status').html('Status: <span class="badge badge-success">Paid</span>');
                $('#mediumModal_2').modal('hide'); // Close the modal
                $('#dataTable').DataTable().ajax.reload(); // Reload the DataTable
                toastr.success(response.message); // Show success notification
            }
        },
        error: function(xhr) {
            toastr.error("There was an error processing the payment. Please try again.");
        }
    });
});

</script>

@endpush
