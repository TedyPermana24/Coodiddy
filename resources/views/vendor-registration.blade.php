@extends('components.layout')

@section('content')
  <!-- Main Content -->
  <main class="flex flex-col items-center py-60">
    <!-- Form Section -->
    <section class="w-full max-w-4xl bg-white rounded-3xl shadow-2xl overflow-hidden" style="box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.2);">
      <form action="{{ route('vendor.registration.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Header Image Section -->
        <div class="relative w-full h-72">
          <img src="{{ asset('img/cat-vendorRegis.jpg') }}" alt="Background" class="w-full h-full object-cover opacity-60" />
          <div class="absolute inset-0 bg-black opacity-10"></div>
          <div class="absolute inset-0 flex items-center justify-center">
            <h2 class="text-[#4a3b32] text-4xl font-semibold">Vendor Registration Form</h2>
          </div>
        </div>

        <!-- Personal Information -->
        <div class="p-8 pb-0">
          <h2 class="text-2xl font-semibold mb-6">Personal Information</h2>
          <div class="mb-8 flex justify-between items-center">
            <label class="text-[#a4724c] text-xl font-semibold">Owner Name</label>
            <input type="text" name="owner_name" placeholder="Insert your name here" class="w-3/4 p-2 border rounded bg-gray-100 border-gray-300 focus:ring focus:ring-[#d4a573] focus:outline-none" required>
          </div>
          
          <!-- Photo ID Section -->
          <div class="flex mb-8 justify-between gap-8">
            <!-- ID Photo Section -->
            <div class="flex justify-between items-center w-[45%]">
              <label class="text-[#a4724c] text-xl font-semibold">ID Photo</label>
              <div class="w-40 h-40 border flex justify-center items-center rounded-2xl overflow-hidden">
                <input type="file" name="id_photo" accept="image/*" class="hidden" id="idPhotoInput" onchange="loadFile(event)" required>
                <label for="idPhotoInput" class="cursor-pointer w-full h-full flex justify-center items-center">
                  <img id="idPhotoPreview" src="#" alt="Upload Image" class="hidden w-full h-full object-cover">
                  <span id="idPhotoPlaceholder" class="text-xs">Upload Image</span>
                </label>
              </div>
            </div>
          
            <!-- Owner Face Section -->
            <div class="flex justify-between items-center w-[45%]">
              <label class="text-[#a4724c] text-xl font-semibold">Owner Face</label>
              <div class="w-40 h-40 border flex justify-center items-center rounded-2xl overflow-hidden">
                <input type="file" name="owner_face" accept="image/*" class="hidden" id="ownerFaceInput" onchange="loadFile(event)" required>
                <label for="ownerFaceInput" class="cursor-pointer w-full h-full flex justify-center items-center">
                  <img id="ownerFacePreview" src="#" alt="Upload Image" class="hidden w-full h-full object-cover">
                  <span id="ownerFacePlaceholder" class="text-xs">Upload Image</span>
                </label>
              </div>
            </div>
          </div>
        </div>

        <!-- Vendor Information -->
        <div class="p-8 pb-0">
          <h2 class="text-2xl font-semibold mb-6">Vendor Information</h2>
          <div class="mb-8 flex justify-between items-start">
            <label class="text-[#a4724c] text-xl font-semibold">Main Photo</label>
            <div class="w-3/4 flex gap-3">
              <!-- img 1 -->
              <div class="w-40 h-40 border flex justify-center items-center rounded-2xl overflow-hidden">
                <input type="file" name="vendor_photo_1" accept="image/*" class="hidden" id="vendorPhotoInput1" onchange="loadFile(event)" required>
                <label for="vendorPhotoInput1" class="cursor-pointer w-full h-full flex justify-center items-center">
                  <img id="vendorPhotoPreview1" src="#" alt="Upload Image" class="hidden w-full h-full object-cover">
                  <span id="vendorPhotoPlaceholder1" class="text-xs">Upload Image</span>
                </label>
              </div>
            </div>
          </div>
          <div class="mb-8 flex justify-between items-start">
            <label class="text-[#a4724c] text-xl font-semibold">Vendor Photo</label>
            <div class="w-3/4 flex gap-3">
              <!-- img 2 -->
              <div class="w-40 h-40 border flex justify-center items-center rounded-2xl overflow-hidden">
                <input type="file" name="vendor_photo_2" accept="image/*" class="hidden" id="vendorPhotoInput2" onchange="loadFile(event)" required>
                <label for="vendorPhotoInput2" class="cursor-pointer w-full h-full flex justify-center items-center">
                  <img id="vendorPhotoPreview2" src="#" alt="Upload Image" class="hidden w-full h-full object-cover">
                  <span id="vendorPhotoPlaceholder2" class="text-xs">Upload Image</span>
                </label>
              </div>
              <!-- img 3 -->
              <div class="w-40 h-40 border flex justify-center items-center rounded-2xl overflow-hidden">
                <input type="file" name="vendor_photo_3" accept="image/*" class="hidden" id="vendorPhotoInput3" onchange="loadFile(event)" required>
                <label for="vendorPhotoInput3" class="cursor-pointer w-full h-full flex justify-center items-center">
                  <img id="vendorPhotoPreview3" src="#" alt="Upload Image" class="hidden w-full h-full object-cover">
                  <span id="vendorPhotoPlaceholder3" class="text-xs">Upload Image</span>
                </label>
              </div>
              <!-- img 4 -->
              <div class="w-40 h-40 border flex justify-center items-center rounded-2xl overflow-hidden">
                <input type="file" name="vendor_photo_4" accept="image/*" class="hidden" id="vendorPhotoInput4" onchange="loadFile(event)" required>
                <label for="vendorPhotoInput4" class="cursor-pointer w-full h-full flex justify-center items-center">
                  <img id="vendorPhotoPreview4" src="#" alt="Upload Image" class="hidden w-full h-full object-cover">
                  <span id="vendorPhotoPlaceholder4" class="text-xs">Upload Image</span>
                </label>
              </div>
            </div>
          </div>
          
          <!-- Vendor Name -->
          <div class="mb-8 flex justify-between items-center">
            <label class="text-[#a4724c] text-xl font-semibold">Vendor Name</label>
            <input type="text" name="vendor_name" placeholder="Insert your vendor name here" class="w-3/4 p-2 border rounded bg-gray-100 border-gray-300 focus:ring focus:ring-[#d4a573] focus:outline-none" required>
          </div>
          
          <!-- Location -->
          <div class="mb-8 flex justify-between items-center">
            <label class="text-[#a4724c] text-xl font-semibold">Location</label>
            <input type="text" name="location" placeholder="Insert your vendor name here" class="w-3/4 p-2 border rounded bg-gray-100 border-gray-300 focus:ring focus:ring-[#d4a573] focus:outline-none" required>
          </div>

          <!-- Phone Number -->
          <div class="mb-8 flex justify-between items-center">
            <label class="text-[#a4724c] text-xl font-semibold">Phone Number</label>
            <input type="text" name="phone" placeholder="Insert your phone number here" class="w-3/4 p-2 border rounded bg-gray-100 border-gray-300 focus:ring focus:ring-[#d4a573] focus:outline-none" required>
          </div>
          
          <!-- Description -->
          <div class="mb-8 flex justify-between items-start">
            <label class="text-[#a4724c] text-xl font-semibold">Description</label>
            <textarea name="description" placeholder="Insert your vendor description here" class="w-3/4 p-2 border rounded h-28 bg-gray-100 border-gray-300 focus:ring focus:ring-[#d4a573] focus:outline-none" required></textarea>
          </div>
          
          <!-- Address -->
          <div class="mb-8 flex justify-between items-start">
            <label class="text-[#a4724c] text-xl font-semibold">Address</label>
            <textarea name="address" placeholder="Insert your vendor address here" class="w-3/4 p-2 border rounded h-28 bg-gray-100 border-gray-300 focus:ring focus:ring-[#d4a573] focus:outline-none" required></textarea>
          </div>
        </div>

        
        <div class="p-8 pb-0">
          <h2 class="text-2xl font-semibold mb-6">Pricing Information</h2>
          
          <div class="mb-8 flex justify-between items-center">
            <label class="text-[#a4724c] text-xl font-semibold">Pet Types</label>
            <div class="w-3/4 relative">
              <div id="petTypeContainer" class="min-h-[48px] w-full flex flex-wrap gap-2 p-2 border rounded bg-gray-100 border-gray-300 focus-within:ring focus-within:ring-[#d4a573]">
                <!-- Pet types will appear here -->
              </div>
              <img src="{{ asset('svg/plus.svg') }}" alt="add icon" class="absolute right-4 top-1/2 transform -translate-y-1/2 w-5 h-5 cursor-pointer" id="addPetTypeModalBtn" />
            </div>
          </div>
        
          <!-- Additional Services Section -->
          <div class="mb-8 flex justify-between items-center">
            <label class="text-[#a4724c] text-xl font-semibold">Add. Services</label>
            <div class="w-3/4 relative">
              <div id="additionalServicesContainer" class="min-h-[48px] w-full flex flex-wrap gap-2 p-2 border rounded bg-gray-100 border-gray-300 focus-within:ring focus-within:ring-[#d4a573]">
                <!-- Additional services will appear here -->
              </div>
              <img src="{{ asset('svg/plus.svg') }}" alt="add icon" class="absolute right-4 top-1/2 transform -translate-y-1/2 w-5 h-5 cursor-pointer" id="addServiceModalBtn" />
            </div>
          </div>

        <!-- Buttons -->
        <div class="p-8 flex justify-end gap-4">
          <button type="button" onclick="window.location='{{ url('/') }}'" class="px-6 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Cancel</button>
          <button type="submit" class="px-6 py-2 bg-[#8B5E3C] text-white rounded-lg hover:bg-[#6B4423]">Submit</button>
        </div>
      </form>
    </section>
  </main>

<!-- Modal Pet Type -->
<div id="addPetTypeModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
  <div class="bg-white p-8 rounded-lg shadow-lg w-1/2">
    <h2 class="text-xl font-semibold mb-4">Add Pet Type</h2>
    <div class="mb-4">
      <label for="petTypeDropdown" class="block text-lg font-medium mb-2">Select Pet Type</label>
      <select id="petTypeDropdown" class="w-full p-2 border rounded">
        <option value="" disabled selected>Choose a pet type</option>
        <option value="Cat">Cat</option>
        <option value="Dog">Dog</option>
      </select>
    </div>
    <div class="mb-4">
      <label for="petTypePrice" class="block text-lg font-medium mb-2">Price</label>
      <input type="number" id="petTypePrice" placeholder="Enter price" class="w-full p-2 border rounded">
    </div>
    <div class="flex justify-end gap-4">
      <button type="button" id="closePetTypeModal" class="px-4 py-2 bg-gray-300 rounded-lg">Cancel</button>
      <button type="button" id="savePetType" class="px-4 py-2 bg-[#8B5E3C] text-white rounded-lg">Save</button>
    </div>
  </div>
</div>


<!-- Modal Additional Services -->
<div id="addServiceModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
  <div class="bg-white p-8 rounded-lg shadow-lg w-1/2">
    <h2 class="text-xl font-semibold mb-4">Add Additional Service</h2>
    <div>
      <label for="serviceName" class="block text-lg font-medium mb-2">Service Name</label>
      <input type="text" id="serviceName" placeholder="Service Name" class="w-full mb-4 p-2 border rounded">
    </div>
    <div>
      <label for="servicePrice" class="block text-lg font-medium mb-2">Price</label>
      <input type="number" id="servicePrice" placeholder="Price" class="w-full mb-4 p-2 border rounded">
    </div>
    <div class="flex justify-end gap-4">
      <button type="button" id="closeServiceModal" class="px-4 py-2 bg-gray-300 rounded-lg">Cancel</button>
      <button type="button" id="saveService" class="px-4 py-2 bg-[#8B5E3C] text-white rounded-lg">Save</button>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  let petTypeCount = 0;
  let petTypesAdded = [];

  // Open modal
  document.getElementById('addPetTypeModalBtn').addEventListener('click', () => {
    document.getElementById('addPetTypeModal').classList.remove('hidden');
  });

  // Close modal
  document.getElementById('closePetTypeModal').addEventListener('click', () => {
    document.getElementById('addPetTypeModal').classList.add('hidden');
  });

  // Save pet type
  document.getElementById('savePetType').addEventListener('click', () => {
    const petTypeDropdown = document.getElementById('petTypeDropdown');
    const petTypePrice = document.getElementById('petTypePrice').value;

    if (petTypeDropdown.value && petTypePrice && !petTypesAdded.includes(petTypeDropdown.value) && petTypesAdded.length < 2) {
      const container = document.getElementById('petTypeContainer');
      const newPetType = petTypeDropdown.value;
      const newPrice = petTypePrice;

      // Add pet type to container
      container.insertAdjacentHTML('beforeend', `
        <div class="flex items-center bg-[#D7BDA7] text-white px-4 py-2 rounded-full gap-2">
          ${newPetType} - Rp.${newPrice}
          <input type="hidden" name="pet_types[${petTypeCount}][type]" value="${newPetType}">
          <input type="hidden" name="pet_types[${petTypeCount}][price]" value="${newPrice}">
          <button type="button" class="text-gray ml-2" onclick="removePetType(this)">X</button>
        </div>
      `);
      
      petTypesAdded.push(newPetType);  // Add to added list
      petTypeCount++;

      // Close modal and reset input fields
      document.getElementById('addPetTypeModal').classList.add('hidden');
      petTypeDropdown.value = "";
      document.getElementById('petTypePrice').value = "";
    }
  });

  // Remove Pet Type
  function removePetType(button) {
    const petTypeElement = button.parentElement;
    const petTypeValue = petTypeElement.querySelector('input[name^="pet_types"]').value;
    petTypesAdded = petTypesAdded.filter(item => item !== petTypeValue);  // Remove from added list
    petTypeElement.remove();
  }
</script>

<script>
  let serviceCount = 0;

  // Open modal
  document.getElementById('addServiceModalBtn').addEventListener('click', () => {
    document.getElementById('addServiceModal').classList.remove('hidden');
  });

  // Close modal
  document.getElementById('closeServiceModal').addEventListener('click', () => {
    document.getElementById('addServiceModal').classList.add('hidden');
  });

  // Save additional service
  document.getElementById('saveService').addEventListener('click', () => {
    const serviceName = document.getElementById('serviceName').value;
    const servicePrice = document.getElementById('servicePrice').value;

    if (serviceName && servicePrice) {
      const container = document.getElementById('additionalServicesContainer');
      const newService = serviceName;
      const newPrice = servicePrice;

      // Add service to container
      container.insertAdjacentHTML('beforeend', `
        <div class="flex items-center bg-[#D7BDA7] text-white px-4 py-2 rounded-full gap-2">
          ${newService} - Rp.${newPrice}
          <input type="hidden" name="additional_services[${serviceCount}][service_name]" value="${newService}">
          <input type="hidden" name="additional_services[${serviceCount}][price]" value="${newPrice}">
          <button type="button" class="text-gray ml-2" onclick="removeService(this)">X</button>
        </div>
      `);
      
      serviceCount++;

      // Close modal and reset input fields
      document.getElementById('addServiceModal').classList.add('hidden');
      document.getElementById('serviceName').value = "";
      document.getElementById('servicePrice').value = "";
    }
  });

  function removeService(button) {
        const serviceElement = button.parentElement;
        serviceElement.remove();  // Remove service from the container
    }
</script>

<script>
  function loadFile(event) {
    const input = event.target;
    const previewId = input.id.replace('Input', 'Preview');
    const placeholderId = input.id.replace('Input', 'Placeholder');
    const preview = document.getElementById(previewId);
    const placeholder = document.getElementById(placeholderId);

    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = (e) => {
        preview.src = e.target.result;
        preview.classList.remove('hidden');
        placeholder.classList.add('hidden');
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endsection
