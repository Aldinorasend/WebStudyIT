<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyIT | Find your way in a Good Way</title>
    <!-- Google Fonts & Material Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-100 flex justify-center items-center">
    <div class="container py-4 h-auto w-full max-w-sm flex flex-col justify-center rounded-lg">
        <form action="" class="pb-6 pt-0 bg-white shadow-lg border-2 border-slate-100">
            <div class="header bg-textColorLight p-6 flex flex-col text-white">
                <h3 class="text-xs flex justify-end">StudyIT</h3>
                <h1 class="text-2xl font-bold">Payment</h1>
                <p class="text-xs mt-1">Please fill your payment data</p>
            </div>
            
            <!-- Package Selection -->
            <div class="package text-textColorLight py-3 px-6 flex flex-col">
                <h2 class="text-sm font-semibold">Package</h2>
                <div class="package-option grid grid-cols-3 gap-1 mt-2">
                    <div class="package-1 text-center border border-gray-300 rounded-md p-1 cursor-pointer hover:border-blue-500" 
                         data-value="Basic" data-amount="50000">
                        <p class="text-xs text-textColorLight font-semibold">Basic</p>
                        <p class="text-xs text-gray-500">Rp.50.000</p>
                    </div>
                    <div class="package-2 text-center border border-gray-300 rounded-md p-1 cursor-pointer hover:border-blue-500" 
                         data-value="Standard" data-amount="100000">
                        <p class="text-xs text-textColorLight font-semibold">Standard</p>
                        <p class="text-xs text-gray-500">Rp.100.000</p>
                    </div>
                    <div class="package-3 text-center border border-gray-300 rounded-md p-1 cursor-pointer hover:border-blue-500" 
                         data-value="Premium" data-amount="150000">
                        <p class="text-xs text-textColorLight font-semibold">Premium</p>
                        <p class="text-xs text-gray-500">Rp.150.000</p>
                    </div>
                </div>
                <input type="hidden" name="selected_package" id="selected_package" value="">
            </div>
            
            <!-- Payment Method Selection -->
            <div class="payment-method text-textColorLight px-6 flex flex-col">
                <h2 class="text-sm font-semibold">Payment Method</h2>
                <div class="method-option grid grid-rows-3 gap-2 mt-2">
                    <div class="method-1 border border-gray-200 rounded-lg p-3 flex flex-row justify-between cursor-pointer hover:border-blue-500" 
                         data-value="Gopay">
                        <div class="content flex flex-row justify-center items-center">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-wallet text-green-600"></i>
                            </div>
                            <p class="text-sm font-semibold">Gopay</p>
                        </div>
                        <div class="selector">
                            <i class="far fa-circle text-gray-300"></i>
                        </div>
                    </div>
                    <div class="method-2 border border-gray-200 rounded-lg p-3 flex flex-row justify-between cursor-pointer hover:border-blue-500" 
                         data-value="ShoppePay">
                        <div class="content flex flex-row justify-center items-center">
                            <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-shopping-bag text-orange-600"></i>
                            </div>
                            <p class="text-sm font-semibold">ShoppePay</p>
                        </div>
                        <div class="selector">
                            <i class="far fa-circle text-gray-300"></i>
                        </div>
                    </div>
                    <div class="method-3 border border-gray-200 rounded-lg p-3 flex flex-row justify-between cursor-pointer hover:border-blue-500" 
                         data-value="Dana">
                        <div class="content flex flex-row justify-center items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-money-bill-wave text-blue-600"></i>
                            </div>
                            <p class="text-sm font-semibold">Dana</p>
                        </div>
                        <div class="selector">
                            <i class="far fa-circle text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="selected_method" id="selected_method" value="">
            </div>
            
            <div class="payment-method text-textColorLight px-6 pt-2 flex flex-col">
                <h2 class="text-sm font-semibold">Phone Number</h2>
                <input class="mt-2 border h-8 p-2 text-sm border-gray-300" type="text" name="phone" id="phone" placeholder="08123456789" required>
            </div>
          
            <div class="amount text-textColorLight px-6 pt-2 flex flex-col">
                <h2 class="text-sm font-semibold">Amount</h2>
                <input class="mt-2 text-sm border h-8 p-2 border-gray-300" type="text" name="amount" id="amount" placeholder="Rp. 100.000" readonly>
            </div>

            <div class="btn flex justify-center mt-4 px-6">
                <button type="submit" id="payButton" disabled
                    class="w-full bg-textColorLight text-white font-semibold py-2 rounded-sm hover:bg-textColorDark transition duration-300">Pay Now</button>
            </div>
        </form>
    </div>

    <!-- Add Font Awesome for icons -->
    
    <!-- JavaScript to handle selections -->
    <script>
        const studentId = window.location.pathname.split('/')[2];
        console.log(studentId);
        const API_PAYMENT = `http://localhost:3000/api/payments`;

        
        document.addEventListener('DOMContentLoaded', function() {
            // Package selection
            const packages = document.querySelectorAll('.package-option > div');
            const selectedPackageInput = document.getElementById('selected_package');
            const amountInput = document.getElementById('amount');
            const phoneInput = document.getElementById('phone');
            
            // Add hidden input for payment date and expiry date
            const form = document.querySelector('form');
            const paymentDateInput = document.createElement('input');
            paymentDateInput.type = 'hidden';
            paymentDateInput.name = 'payment_date';
            paymentDateInput.id = 'payment_date';
            form.appendChild(paymentDateInput);
            
            const expiryDateInput = document.createElement('input');
            expiryDateInput.type = 'hidden';
            expiryDateInput.name = 'expiry_date';
            expiryDateInput.id = 'expiry_date';
            form.appendChild(expiryDateInput);

            // Function to format date as YYYY-MM-DD
            function formatDate(date) {
                const d = new Date(date);
                let month = '' + (d.getMonth() + 1);
                let day = '' + d.getDate();
                const year = d.getFullYear();

                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;

                return [year, month, day].join('-');
            }

            // Function to add months to a date
            function addMonths(date, months) {
                const result = new Date(date);
                result.setMonth(result.getMonth() + months);
                return result;
            }

            packages.forEach(pkg => {
                pkg.addEventListener('click', function() {
                    // Remove selected class from all packages
                    packages.forEach(p => p.classList.remove('border-blue-500', 'bg-blue-50'));
                    
                    // Add selected class to clicked package
                    this.classList.add('border-blue-500', 'bg-blue-50');
                    
                    // Get package data
                    const packageValue = this.getAttribute('data-value');
                    const packageAmount = this.getAttribute('data-amount');
                    
                    // Update hidden input value
                    selectedPackageInput.value = packageValue;
                    
                    // Update amount field
                    amountInput.value = formatCurrency(packageAmount);
                    
                    // Set payment date (today)
                    const currentDate = new Date();
                    paymentDateInput.value = formatDate(currentDate);
                    function formatCurrency(amount) {
                        return 'Rp.' + parseInt(amount).toLocaleString('id-ID');
                    }
            
                    // Calculate expiry date based on package
                    let monthsToAdd = 0;
                    switch(packageValue) {
                        case 'basic':
                            monthsToAdd = 1;
                            break;
                        case 'standard':
                            monthsToAdd = 3;
                            break;
                        case 'premium':
                            monthsToAdd = 6;
                            break;
                    }
                    
                    const expiryDate = addMonths(currentDate, monthsToAdd);
                    expiryDateInput.value = formatDate(expiryDate);
                    
                    // Log to console
                    console.log('Package selected:', {
                        name: packageValue,
                        amount: packageAmount,
                        payment_date: paymentDateInput.value,
                        expiry_date: expiryDateInput.value

                    });
                    
                    // Enable pay button if all required fields are filled
                    checkFormCompletion();

                });
            });
            // Payment method selection
            const methods = document.querySelectorAll('.method-option > div');
            const selectedMethodInput = document.getElementById('selected_method');
            
            methods.forEach(method => {
                method.addEventListener('click', function() {
                    // Remove selected class from all methods
                    methods.forEach(m => {
                        m.classList.remove('border-blue-500', 'bg-blue-50');
                        const icon = m.querySelector('.selector i');
                        icon.classList.remove('fas', 'fa-check-circle', 'text-blue-500');
                        icon.classList.add('far', 'fa-circle', 'text-gray-300');
                    });
                    
                    // Add selected class to clicked method
                    this.classList.add('border-blue-500', 'bg-blue-50');
                    const icon = this.querySelector('.selector i');
                    icon.classList.remove('far', 'fa-circle', 'text-gray-300');
                    icon.classList.add('fas', 'fa-check-circle', 'text-blue-500');
                    
                    // Get method data
                    const methodValue = this.getAttribute('data-value');
                    
                    // Update hidden input value
                    selectedMethodInput.value = methodValue;
                    
                    // Log to console
                    console.log('Payment method selected:', methodValue);
                    
                    // Enable pay button if all required fields are filled
                    checkFormCompletion();
                });
            });
            // ... (rest of your existing JavaScript code)
            
            function checkFormCompletion() {
                const payButton = document.getElementById('payButton');
                const phone = phoneInput.value.trim();
                
                if (selectedPackageInput.value && selectedMethodInput.value && phone) {
                    payButton.disabled = false;
                    payButton.classList.remove('bg-gray-300');
                    payButton.classList.add('bg-textColorLight');
                    console.log('Form is complete. Ready to submit:', {
                        package: selectedPackageInput.value,
                        method: selectedMethodInput.value,
                        phone: phone,
                        amount: amountInput.value,
                        start_date : paymentDateInput.value,
                        end_date : expiryDateInput.value
                    });
                } else {
                    payButton.disabled = true;
                    payButton.classList.remove('bg-textColorLight');
                    payButton.classList.add('bg-gray-300');
                   
                   
                }
            }
            // Modify form submission to include dates
            document.querySelector('form').addEventListener('submit',async function(e) {
                e.preventDefault();
                const paymentData = {
                    UserID: studentId,
                    Category: selectedPackageInput.value,
                    Payment_method: selectedMethodInput.value,
                    Phone_number: phoneInput.value,
                    Amount: amountInput.value.replace(/\D/g, ''), // Remove 'Rp.' and formatting
                    Payment_date: paymentDateInput.value,
                    End_date: expiryDateInput.value,
                    Status: 'Pending'
                };

                // Log what we're sending
                console.log('Sending payment data:', paymentData);

                try {
                        // Mengirim data form ke API
                        const response = await fetch(API_PAYMENT, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body:JSON.stringify(paymentData), // Mengirim FormData
                        });

                        // Mengecek apakah permintaan berhasil
                        if (response.ok) {
                            Swal.fire({
                                title: 'Payment Successful',
                                text: 'Your payment has been processed successfully.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                // Redirect to another page or perform another action
                                window.location.href = `/students/${studentId}/dashboard`;
                            });
                        } else {
                            const error = await response.json();
                            alert('Error processing payment ' + error.message);
                        }
                    } catch (error) {
                        console.error('Error processing payment:', error);
                        alert('Error processing payment: ' + error.message);
                    }
                
        
               
            });

       
    });
</script>
</body>


</html>
