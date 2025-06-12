@extends('layouts.admin')
@section('title', 'Payments History Page')
@section('content')

<h1 class="text-2xl font-bold px-10 ">Payment History</h1>
<h2 class="text-md  px-10 ">View all your subscripition transaction</h2>

<div class="container py-10 px-10">
    <table class="w-full border border-gray-300 rounded-lg shadow-md">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="p-5 text-sm font-semibold text-start">TRANSACTION</th>
                <th class="p-5 text-sm font-semibold text-center">PACKAGE</th>
                <th class="p-5 text-sm font-semibold text-center">AMOUNT</th>
                <th class="p-5 text-sm font-semibold text-start">DATES</th>
                <th class="p-5 text-sm font-semibold text-center">STATUS</th>
                <th class="p-5 text-sm font-semibold text-center">ACTIONS</th>
            </tr>
        </thead>
        <tbody id="table-body">
            <tr>
                <td colspan="9" class="text-center text-gray-500 p-2">Loading...</td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    const apiUrl = 'http://localhost:3000/api/payments';


    function generateInvoiceNumber(startDate, endDate) {
        const start = new Date(startDate);
        const end = new Date(endDate);

        // Format tanggal jadi YYYYMMDD
        const startStr = start.toISOString().split('T')[0].replace(/-/g, '');
        const endStr = end.toISOString().split('T')[0].replace(/-/g, '');

        // Generate 4-digit random number
        const randomPart = Math.floor(1000 + Math.random() * 9000); // 1000–9999

        return `INV-${startStr}-${endStr}-${randomPart}`;
    }

    function formatAmount(amount) {
        amount = Number(amount);
        if (amount >= 1000) {
            return (amount / 1000).toFixed(amount % 1000 === 0 ? 0 : 1) + 'k';
        }
        return amount;
    }

    async function fetchData() {
        try {
            const response = await fetch(apiUrl);
            if (!response.ok) throw new Error('Network response was not ok');
            const data = await response.json();
            console.log(data);
            const tableBody = document.getElementById('table-body');
            tableBody.innerHTML = ''; // Hapus isi sebelumnya

            if (data.length === 0) {
                tableBody.innerHTML =
                    `<tr><td colspan="9" class="text-start text-gray-500 p-4">No Message found.</td></tr>`;
                return;
            }
            console.log(data);

            let invoiceNumber; // Declare invoiceNumber variable here
            data.forEach((payments, index) => {
                tableBody.insertAdjacentHTML('beforeend', `
                        <tr class="border-b hover:bg-gray-100 transition">
                        <td class="p-5 text-start text-sm   ">
                        <div class = "flex flex-row items-center gap-3">
                            <span class="bg-blue-400 rounded-full p-3  text-white flex flex-col items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                </svg>
                            </span>                     
                            <div class = "flex flex-col items-start">
                                <span class="font-semibold text-sm">${invoiceNumber = generateInvoiceNumber(new Date(payments.Payment_date).toLocaleDateString(), new Date(payments.End_date).toLocaleDateString())}</span>
                                <span class="text-xs text-blue-700">${payments.email}</span>
                            </div>
                        </div>
                        </td>
                        <td class="p-5 text-center">${payments.Category}</td>
                        <td class="p-5 text-center">${formatAmount(payments.Amount)}</td>
                        <td class="p-5 text-start">
                            <div class = "flex flex-col items-start">
                                <span class="text-md text-black">
                                    ${new Date(payments.Payment_date).toLocaleDateString(
                                    'en-US', {
                                        month: 'short',
                                        day: '2-digit',
                                        year: 'numeric',
                                    })}
                                </span>
                                <span class="text-xs text-gray-600">to 
                                    ${new Date(payments.End_date).toLocaleDateString(
                                    'en-US', {
                                        month: 'short',
                                        day: '2-digit',
                                        year: 'numeric',
                                    })}                                
                                </span>
                            </div>
                        </td>
                        <td class="p-5 text-center">${payments.Status}</td>
                        <td class="p-5 text-center">
                            <button class="bg-green-500 text-white px-4 py-2 rounded-lg  font-semibold text-sm flex items-center hover:bg-blue-600 transition duration-200" onclick="confirmPayment(${payments.UserID})">
                                Confirm
                        </td>
                    </tr>
                `);
            });
        } catch (error) {
            console.error('Error fetching data:', error);
            document.getElementById('table-body').innerHTML =
                `<tr><td colspan="9" class="text-center text-red-500 p-4">Error loading data.</td></tr>`;
        }
    }

    async function confirmPayment(id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then(async (result) => {
            if (result.isConfirmed) {
                try {

                    const response = await fetch(`http://localhost:3000/api/updateUser/${id}`, {
                        method: 'PUT'
                    });
                    if (!response.ok) throw new Error('Failed to update user status');

                    alert('User status successfully changed');
                    fetchData(); // Refresh data
                } catch (error) {
                    console.error('Error deleting message:', error);
                    alert('Failed to delete message');
                }

            }

        });
    }

    // Load data saat halaman dimuat
    document.addEventListener('DOMContentLoaded', fetchData);

</script>

@endsection
