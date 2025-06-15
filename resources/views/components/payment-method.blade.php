<div>
    <p class="font-semibold mb-2">Payment Method</p>
    <div class="flex gap-4" id="paymentMethodOptions">
        <!-- Opsi COD -->
        <label class="payment-option w-1/2 border border-gray-300 text-center py-2 cursor-pointer rounded active">
            <input type="radio" name="payment_method" value="cod" class="hidden" checked>
            Cash On Delivery
        </label>

        <!-- Opsi Transfer Bank -->
        <label class="payment-option w-1/2 border border-gray-300 text-center py-2 cursor-pointer rounded">
            <input type="radio" name="payment_method" value="bank_transfer" class="hidden">
            Transfer Bank
        </label>
    </div>

    {{-- Style tetap di dalam --}}
    <style>
        .payment-option.active {
            background-color: #501A2E;
            color: white;
            border-color: #501A2E;
        }
    </style>

    {{-- untuk milih payment methodnya mau yang mana --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const paymentOptions = document.querySelectorAll('.payment-option');

            paymentOptions.forEach(option => {
                option.addEventListener('click', () => {
                    paymentOptions.forEach(el => el.classList.remove('active'));
                    option.classList.add('active');
                    option.querySelector('input[type="radio"]').checked = true;
                });
            });
        });
    </script>
</div>

{{-- Pilih Bank --}}
<!-- dropdown untuk pilih bank -->
<div class="relative inline-block w-full">
    <label class="block font-semibold mb-1">Choose Bank for Payment</label>

    <!-- button untuk dropdown -->
    <button id="bankDropdownBtn" type="button" class="w-full border rounded px-3 py-2 flex items-center justify-between bg-white">
        <span class="flex items-center">
            <img src="/assets/payment/bca.svg" alt="BCA" class="w-6 h-6 mr-2">
            BCA
        </span>
        <svg class="w-4 h-4 ml-2 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <!-- pilihan bank -->
    <div id="bankDropdown" class="hidden absolute z-10 w-full bg-white border rounded mt-1 shadow">
        <div class="cursor-pointer hover:bg-gray-100 px-4 py-2 flex items-center" onclick="selectBank('bca', 'svg', 'BCA')">
            <img src="/assets/payment/bca.svg" alt="BCA" class="w-6 h-6 mr-2"> BCA
        </div>
        <div class="cursor-pointer hover:bg-gray-100 px-4 py-2 flex items-center" onclick="selectBank('bri', 'png', 'BRI')">
            <img src="/assets/payment/bri.png" alt="BRI" class="w-6 h-6 mr-2"> BRI
        </div>
        <div class="cursor-pointer hover:bg-gray-100 px-4 py-2 flex items-center" onclick="selectBank('mandiri', 'jpg', 'Mandiri')">
            <img src="/assets/payment/mandiri.jpg" alt="Mandiri" class="w-6 h-6 mr-2"> Mandiri
        </div>
    </div>

    <!-- Hidden input untuk form -->
    <input type="hidden" id="selectedBank" name="bank" value="bca" />
</div>

<!-- Script -->
<script>
    const dropdownBtn = document.getElementById('bankDropdownBtn');
    const dropdown = document.getElementById('bankDropdown');
    const selectedBankInput = document.getElementById('selectedBank');

    dropdownBtn.addEventListener('click', () => {
        dropdown.classList.toggle('hidden');
    });

    function selectBank(bank, extension, label) {
        const imgPath = `/assets/payment/${bank}.${extension}`;
        dropdownBtn.querySelector('span').innerHTML = `
      <img src="${imgPath}" alt="${label}" class="w-6 h-6 mr-2"> ${label}
    `;
        selectedBankInput.value = bank;
        dropdown.classList.add('hidden');
    }

    // Klik di luar dropdown => tutup
    document.addEventListener('click', function(e) {
        if (!dropdownBtn.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>