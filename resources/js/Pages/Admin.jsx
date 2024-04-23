import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";

export default function Admin({ auth }) {
    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title="Admin Dashboard" />
            <div class="flex h-screen">
                {/* <!-- Sidebar --> */}
                <div class="bg-gray-800 text-white w-64 flex flex-col">
                    <div class="p-4 border-b border-gray-700">
                        <h1 class="text-xl font-semibold">Admin Dashboard</h1>
                    </div>
                    <div class="flex-1 overflow-y-auto">
                        {/* <!-- Sidebar content --> */}
                        <ul class="py-4">
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Dashboard
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                General Settings
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Withdrawals
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Verification Requests
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Deposits
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Posts
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Subscriptions
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Transactions
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Members
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Reports
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Announcements
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Maintenance mode
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Billing Information
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Tax Rates
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Countries/States
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Email settings
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Live Streaming
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Push Notifications
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Stories - sub
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Shop
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Products
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Shop Categories
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Sales
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Storage
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Theme
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Custom CSS/JS
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Referrals
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Languages
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Categories
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Pages
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Blog
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Payment Settings - sub
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Profiles Social
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Social Login
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                Google
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                                PWA
                            </li>
                        </ul>
                    </div>
                </div>

                {/* <!-- Main content --> */}
                <div class="flex-1">
                    <div className="py-12">
                        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div className="p-6 text-gray-900">
                                    Welcome to Admin Dashboard
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
