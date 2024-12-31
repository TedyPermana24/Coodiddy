@extends('components.layout')

@section('content')
  <!-- Main Content -->
  <main class="flex flex-col items-center py-60">
    <!-- Form Section -->
    <section class="w-full max-w-4xl bg-white rounded-3xl shadow-2xl overflow-hidden" style="box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.2);">
      <form action="{{ route('vendor.register') }}" method="POST" enctype="multipart/form-data">
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
          <div class="mb-8 flex items-center">
            <label class="block text-[#a4724c] text-xl font-semibold mb-2 mr-11 flex-grow-1/8">Owner Name</label>
            <input type="text" name="owner_name" placeholder="Insert your name here" class="flex-grow p-2 border rounded ml-1 bg-gray-100 border-gray-300 focus:ring focus:ring-[#d4a573] focus:outline-none" required>
          </div>
          <div class="flex mb-8 gap-8">
            <div class="mb-8 flex items-center">
              <label class="block text-[#a4724c] text-xl font-semibold mb-2 mr-11 flex-grow-1/8">ID Photo</label>
              <div class="w-40 h-40 border flex justify-center items-center rounded-2xl ml-14 overflow-hidden">
                <input type="file" name="id_photo" accept="image/*" class="hidden" id="idPhotoInput" onchange="loadFile(event)" required>
                <label for="idPhotoInput" class="cursor-pointer w-full h-full flex justify-center items-center">
                  <img id="idPhotoPreview" src="#" alt="Upload Image" class="hidden w-full h-full object-cover">
                  <span id="idPhotoPlaceholder" class="text-xs">Upload Image</span>
                </label>
              </div>
            </div>
            <div class="w-1 bg-[#a4724c] h-40"></div>
            <div class="mb-8 flex items-center">
              <label class="block text-[#a4724c] text-xl font-semibold mb-2 mr-11 flex-grow-1/8">Owner Face</label>
              <div class="w-40 h-40 border flex justify-center items-center rounded-2xl ml-14 overflow-hidden">
                <input type="file" name="owner_face" accept="image/*" class="hidden" id="ownerFaceInput" onchange="loadFile(event)" required>
                <label for="ownerFaceInput" class="cursor-pointer w-full h-full flex justify-center items-center">
                  <img id="ownerFacePreview" src="#" alt="Upload Image" class="hidden w-full h-full object-cover">
                  <span id="ownerFacePlaceholder" class="text-xs">Upload Image</span>
                </label>
              </div>
            </div>
          </div>

          <!-- Vendor Information -->
          <h2 class="text-2xl font-semibold mb-6">Vendor Information</h2>
          <div class="mb-8 flex items-center">
            <label class="block text-[#a4724c] text-xl font-semibold mb-2 mr-11 flex-grow-1/8 whitespace-nowrap">Vendor Photo</label>
            <!-- img 1 -->
            <div class="w-40 h-40 border flex justify-center items-center rounded-2xl ml-1 overflow-hidden">
              <input type="file" name="vendor_photo_1" accept="image/*" class="hidden" id="vendorPhotoInput1" onchange="loadFile(event)">
              <label for="vendorPhotoInput1" class="cursor-pointer w-full h-full flex justify-center items-center">
                <img id="vendorPhotoPreview1" src="#" alt="Upload Image" class="hidden w-full h-full object-cover">
                <span id="vendorPhotoPlaceholder1" class="text-xs">Upload Image</span>
              </label>
            </div>
            <!-- img 2 -->
            <div class="w-40 h-40 border flex justify-center items-center rounded-2xl ml-3 overflow-hidden">
              <input type="file" name="vendor_photo_2" accept="image/*" class="hidden" id="vendorPhotoInput2" onchange="loadFile(event)">
              <label for="vendorPhotoInput2" class="cursor-pointer w-full h-full flex justify-center items-center">
                <img id="vendorPhotoPreview2" src="#" alt="Upload Image" class="hidden w-full h-full object-cover">
                <span id="vendorPhotoPlaceholder2" class="text-xs">Upload Image</span>
              </label>
            </div>
            <!-- img 3 -->
            <div class="w-40 h-40 border flex justify-center items-center rounded-2xl ml-3 overflow-hidden">
              <input type="file" name="vendor_photo_3" accept="image/*" class="hidden" id="vendorPhotoInput3" onchange="loadFile(event)">
              <label for="vendorPhotoInput3" class="cursor-pointer w-full h-full flex justify-center items-center">
                <img id="vendorPhotoPreview3" src="#" alt="Upload Image" class="hidden w-full h-full object-cover">
                <span id="vendorPhotoPlaceholder3" class="text-xs">Upload Image</span>
              </label>
            </div>
            <!-- img 4 -->
            <div class="w-40 h-40 border flex justify-center items-center rounded-2xl ml-3 overflow-hidden">
              <input type="file" name="vendor_photo_4" accept="image/*" class="hidden" id="vendorPhotoInput4" onchange="loadFile(event)">
              <label for="vendorPhotoInput4" class="cursor-pointer w-full h-full flex justify-center items-center">
                <img id="vendorPhotoPreview4" src="#" alt="Upload Image" class="hidden w-full h-full object-cover">
                <span id="vendorPhotoPlaceholder4" class="text-xs">Upload Image</span>
              </label>
            </div>
          </div>
          <div class="mb-8 flex items-center">
            <label class="block text-[#a4724c] text-xl font-semibold mb-2 mr-11 flex-grow-1/8">Vendor Name</label>
            <input type="text" name="vendor_name" placeholder="Insert your vendor name here" class="flex-grow p-2 border rounded ml-1 bg-gray-100 border-gray-300 focus:ring focus:ring-[#d4a573] focus:outline-none" required>
          </div>
          <div class="mb-8 flex items-center">
            <label class="block text-[#a4724c] text-xl font-semibold mb-2 mr-11 flex-grow-1/8">Capacities</label>
            <input type="text" name="capacities" placeholder="Insert your vendor capacities here" class="flex-grow p-2 border rounded ml-9 bg-gray-100 border-gray-300 focus:ring focus:ring-[#d4a573] focus:outline-none" required>
          </div>
          <div class="mb-8 flex items-center">
            <label class="block text-[#a4724c] text-xl font-semibold mb-2 mr-11 flex-grow-1/8">Vendor Type</label>
            <input list="vendorTypes" name="vendor_type" placeholder="Insert your type vendor services here" class="flex-grow p-2 border rounded ml-4 bg-gray-100 border-gray-300 focus:ring focus:ring-[#d4a573] focus:outline-none" required>
            <datalist id="vendorTypes">
              <option value="Food & Beverage"></option>
              <option value="Clothing"></option>
              <option value="Electronics"></option>
              <option value="Furniture"></option>
              <option value="Services"></option>
            </datalist>
          </div>
          <div class="mb-8 flex items-center">
            <label class="block text-[#a4724c] text-xl font-semibold mb-2 mr-10 flex-grow-1/8">Phone Number</label>
            <input type="text" name="phone_number" placeholder="Insert your phone number here" class="flex-grow p-2 border rounded bg-gray-100 border-gray-300 focus:ring focus:ring-[#d4a573] focus:outline-none" required>
          </div>
          <div class="mb-8 flex items-center">
            <label class="block text-[#a4724c] text-xl font-semibold mb-2 mr-11 flex-grow-1/8">Description</label>
            <textarea name="description" placeholder="Insert your vendor description here" class="flex-grow p-2 border rounded ml-7 h-28 bg-gray-100 border-gray-300 focus:ring focus:ring-[#d4a573] focus:outline-none" required></textarea>
          </div>
          <div class="mb-8 flex items-center">
            <label class="block text-[#a4724c] text-xl font-semibold mb-2 mr-11 flex-grow-1/8">Address</label>
            <textarea name="address" placeholder="Insert your vendor address here" class="flex-grow p-2 border rounded ml-16 h-28 bg-gray-100 border-gray-300 focus:ring focus:ring-[#d4a573] focus:outline-none" required></textarea>
          </div>
        </div>

        <!-- Services -->
        <div class="p-8 pb-0">
          <h2 class="text-2xl font-semibold mb-6">Services</h2>
          <div class="mb-8 flex items-center">
            <label class="block text-[#a4724c] text-xl font-semibold mb-2 mr-14 flex-grow-1/8">Cost per-day</label>
            <div class="flex-grow flex border rounded bg-gray-100 border-gray-300 focus:ring focus:ring-[#d4a573] focus:outline-none">
              <span class="px-4 py-2 bg-[#6b4423] text-white">RP</span>
              <input type="text" name="cost_per_day" placeholder="Insert your vendor cost per day here" class="w-full p-2 bg-gray-100 border-gray-300 focus:ring focus:ring-[#d4a573] focus:outline-none" required>
            </div>
          </div>
          <div class="mb-8 flex items-center">
            <label class="block text-[#a4724c] text-xl font-semibold mb-2 mr-2 flex-grow-1/8">Additional Service</label>
            <input type="text" name="additional_service" placeholder="Insert your additional vendor services here" class="flex-grow p-2 border rounded bg-gray-100 border-gray-300 focus:ring focus:ring-[#d4a573] focus:outline-none" required>
          </div>
        </div>

        <!-- Terms and Conditions -->
        <div class="p-8 pb-0 px-16">
          <div class="text-center mb-8 flex items-center">
              <input type="checkbox" name="terms" id="terms" class="mr-6 w-7 h-7 rounded-md text-[#a4724c] focus:ring-[#d4a573]" required>
            <label for="terms" class="text-left">I have read, understood, and agree to the terms and conditions outlined in the <br> <a href="#" class="text-[#0071ff]">Contract Between Coodiddy and Vendors</a>.</label>
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

@endsection

@section('script')
<script>
  function loadFile(event) {
    var output = document.getElementById('idPhotoPreview');
    var placeholder = document.getElementById('idPhotoPlaceholder');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
    output.classList.remove('hidden');
    placeholder.classList.add('hidden');
  }
</script>
@endsection
