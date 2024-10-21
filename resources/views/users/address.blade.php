@extends('layouts.base')
@section('content')
    <!-- Edit Address Modal -->
    <div class="modal fade" id="editAddressModal" tabindex="-1" aria-labelledby="editAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editAddressModalLabel">Edit Address</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- Form fields for editing address details -->
            <form id="editAddressForm">
            <!-- Address fields (e.g., street, city, state, etc.) -->
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name"
                    placeholder="Enter Full Name">
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone"
                    placeholder="Enter Phone Number">
            </div>
            <div class="col-md-6">
                <label for="locality" class="form-label">Locality</label>
                <input type="text" class="form-control" id="locality" name="locality"
                    placeholder="Locality">
            </div>
            <div class="col-md-6">
                <label for="landmark" class="form-label">Landmark</label>
                <input type="text" class="form-control" id="landmark" name="landmark"
                    placeholder="Landmark">
            </div>

            <div class="col-md-12">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address"></textarea>

            </div>

            <div class="col-md-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="City">

            </div>

            <div class="col-md-3">
                <label for="country" class="form-label">Country</label>
                <select class="form-select custome-form-select" id="country" name="country">
                    <option>India</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid country.
                </div>
            </div>
            <div class="col-md-3">
                <label for="state" class="form-label">State</label>
                <select class="form-select custome-form-select" id="state" name="state">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                    <option value="Assam">Assam</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Chhattisgarh">Chhattisgarh</option>
                    <option value="Goa">Goa</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="Mizoram">Mizoram</option>
                    <option value="Nagaland">Nagaland</option>
                    <option value="Odisha">Odisha</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Sikkim">Sikkim</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Telangana">Telangana</option>
                    <option value="Tripura">Tripura</option>
                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                    <option value="Uttarakhand">Uttarakhand</option>
                    <option value="West Bengal">West Bengal</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="zip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="zip" name="zip" placeholder="123456">
            </div>
            <!-- Other address fields go here -->
            <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('.edit-address-btn').click(function(){
            var addressId =$(this).data('address-id');
            $.ajax({
                url: '/get-address/'+addressId,
                method:'GET',
                success: function(response){
                    $('.editAddress').val(response.address);
                    $('.editAddressModal').modal('show');
                },
                error:function(xhr,status,error){
                    console.error(xhr.responseText);
                }
            });
        });

        // Handle form submission
        $('#editAddressForm').submit(function(event) {
            // Prevent default form submission
            event.preventDefault();
            // Get form data
            var formData = $(this).serialize();
            
            // AJAX request to update address details
            $.ajax({
                url: '/update-address', // URL for updating address
                method: 'POST',
                data: formData,
                success: function(response) {
                    // Handle success (e.g., show success message)
                    console.log('Address updated successfully');
                    // Hide the modal
                    $('#editAddressModal').modal('hide');
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(xhr.responseText);
                }
            });
        });
    </script>
@endpush