<?php $this->extend("layouts/auth"); ?>

<?php $this->section('pageStyles'); ?>
<style>
    .gradient-bg {
        background: linear-gradient(135deg, #8B5CF6 0%, #6D28D9 100%);
    }

    .dots-pattern {
        background-image: url("data:image/svg+xml,%3Csvg width='20' height='20' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='2' cy='2' r='1' fill='%238B5CF6' fill-opacity='0.1'/%3E%3C/svg%3E");
    }

    .purple-glow {
        box-shadow: 0 0 20px rgba(139, 92, 246, 0.5);
    }
</style>
<?php $this->endSection(); ?>


<?php $this->section('content'); ?>
<!-- Navbar -->
<nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md shadow-sm">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <div class="flex items-center">
            <a href="index.html" class="flex items-center">
                <div class="w-10 h-10 rounded-lg gradient-bg flex items-center justify-center mr-2">
                    <span class="text-white font-bold text-xl">V</span>
                </div>
                <span class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">Veltrix</span>
            </a>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center space-x-8">
            <a href="index.html" class="font-medium hover:text-primary transition-colors">Home</a>
            <a href="blog.html" class="font-medium hover:text-primary transition-colors">Blog</a>
            <a href="faqs.html" class="font-medium hover:text-primary transition-colors">FAQs</a>
            <a href="help-center.html" class="font-medium hover:text-primary transition-colors">Help Center</a>
            <a href="signup.html" class="btn btn-primary rounded-full px-6 text-white">Sign Up</a>
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden" x-data="{ open: false }">
            <button @click="open = !open" class="btn btn-ghost">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Mobile Menu -->
            <div x-show="open" @click.away="open = false" class="absolute top-full right-0 w-48 bg-white shadow-lg rounded-lg py-2 mt-1" x-transition>
                <a href="index.html" class="block px-4 py-2 hover:bg-base-200">Home</a>
                <a href="blog.html" class="block px-4 py-2 hover:bg-base-200">Blog</a>
                <a href="faqs.html" class="block px-4 py-2 hover:bg-base-200">FAQs</a>
                <a href="help-center.html" class="block px-4 py-2 hover:bg-base-200">Help Center</a>
                <a href="signup.html" class="block px-4 py-2 hover:bg-base-200">Sign Up</a>
            </div>
        </div>
    </div>
</nav>

<!-- Login Section -->
<section class="py-12 min-h-screen flex items-center dots-pattern bg-blue-300 relative">
    <div class="absolute inset-0  bg-gradient-to-b from-base-200/95 to-base-200/90"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-md mx-auto">
            <!-- Logo -->
            <div class="text-center mb-8">
                <div class="w-16 h-16 rounded-xl gradient-bg flex items-center justify-center mx-auto mb-4">
                    <span class="text-white font-bold text-2xl">V</span>
                </div>
                <h1 class="text-3xl font-bold">Welcome Back</h1>
                <p class="text-gray-600 mt-2">Log in to continue your learning journey</p>
            </div>


            <?php if (session('error') !== null) : ?>
                <div class="mb-2 alert alert-error alert-soft" role="alert"><?= session('error') ?></div>
            <?php elseif (session('errors') !== null) : ?>
                <div class="mb-2 alert alert-error alert-soft" role="alert">
                    <?php if (is_array(session('errors'))) : ?>
                        <?php foreach (session('errors') as $error) : ?>
                            <?= $error ?>
                            <br>
                        <?php endforeach ?>
                    <?php else : ?>
                        <?= session('errors') ?>
                    <?php endif ?>
                </div>
            <?php endif ?>

            <?php if (session('message') !== null) : ?>
                <div class="alert alert-success alert-soft" role="alert"><?= session('message') ?></div>
            <?php endif ?>

            <!-- Login Form -->
            <div class="bg-white rounded-xl shadow-lg p-8" x-data="loginForm">
                <form @submit.prevent="validateForm" method="post" action="<?= url_to("login") ?>">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="email">Email Address</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="input input-bordered w-full"
                                placeholder="your.email@example.com"
                                x-model="email" />
                            <p x-show="errors.email" x-text="errors.email" class="mt-1 text-red-500 text-xs"></p>
                        </div>

                        <div>
                            <div class="flex justify-between items-center mb-1">
                                <label class="block text-sm font-medium text-gray-700" for="password">Password</label>
                                <a href="forgot-password.html" class="text-sm text-primary hover:underline">Forgot Password?</a>
                            </div>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="input input-bordered w-full"
                                placeholder="Your password"
                                x-model="password">
                            <p x-show="errors.password" x-text="errors.password" class="mt-1 text-red-500 text-xs"></p>
                        </div>

                        <div class="flex items-center">
                            <input
                                type="checkbox"
                                id="rememberMe"
                                class="checkbox checkbox-primary"
                                x-model="rememberMe">
                            <label for="rememberMe" class="ml-2 block text-sm text-gray-700">Remember me</label>
                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary text-white w-full">
                            <span>Log In</span>
                        </button>
                    </div>
                </form>

                <div class="divider text-gray-400 text-sm">or</div>

                <div class="space-y-3">
                    <button class="btn btn-outline w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 48 48">
                            <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z" />
                            <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z" />
                            <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z" />
                            <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z" />
                        </svg>
                        Continue with Google
                    </button>

                    <button class="btn btn-outline w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24">
                            <path d="M22 12c0-5.523-4.477-10-10-10s-10 4.477-10 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54v-2.891h2.54V9.799c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.891h-2.33v6.987C18.343 21.128 22 16.991 22 12z" fill="#1877F2" />
                            <path d="M15.893 14.891L16.336 12H13.563V10.126c0-.79.387-1.562 1.63-1.562h1.26V6.105s-1.144-.195-2.238-.195c-2.285 0-3.777 1.384-3.777 3.89V12h-2.54v2.891h2.54v6.987a10.04 10.04 0 003.124 0v-6.987h2.33z" fill="#FFFFFF" />
                        </svg>
                        Continue with Facebook
                    </button>

                    <button class="btn btn-outline w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24">
                            <path d="M12.146 0C5.436 0 0 5.437 0 12.146c0 5.375 3.475 9.922 8.33 11.527.6.107.82-.267.82-.592 0-.3-.01-1.092-.015-2.14-3.398.733-4.117-1.626-4.117-1.626-.556-1.403-1.357-1.779-1.357-1.779-1.108-.757.086-.735.086-.735 1.228.086 1.876 1.261 1.876 1.261 1.093 1.87 2.866 1.334 3.56 1.015.108-.79.425-1.334.775-1.642-2.71-.309-5.553-1.355-5.553-6.033 0-1.335.477-2.427 1.255-3.28-.14-.311-.54-1.546.1-3.233 0 0 1.03-.325 3.35 1.252a11.518 11.518 0 016.003 0c2.32-1.577 3.348-1.252 3.348-1.252.64 1.687.24 2.922.12 3.233.781.853 1.255 1.945 1.255 3.28 0 4.693-2.854 5.717-5.578 6.02.436.375.83 1.109.83 2.245 0 1.625-.015 2.928-.015 3.326 0 .322.216.7.825.578 4.85-1.612 8.3-6.155 8.3-11.526C24.292 5.437 18.859 0 12.146 0z" fill="#24292e" />
                        </svg>
                        Continue with GitHub
                    </button>
                </div>

                <div class="mt-6 text-center">
                    <p class="text-gray-600">Don't have an account? <a href="signup.html" class="text-primary hover:underline">Sign up</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-neutral text-white py-8">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="flex items-center mb-4 md:mb-0">
                <div class="w-8 h-8 rounded-lg gradient-bg flex items-center justify-center mr-2">
                    <span class="text-white font-bold text-sm">V</span>
                </div>
                <span class="text-xl font-bold text-white">Veltrix</span>
            </div>

            <div class="flex space-x-6">
                <a href="terms.html" class="text-white/70 hover:text-white text-sm">Terms</a>
                <a href="privacy.html" class="text-white/70 hover:text-white text-sm">Privacy</a>
                <a href="help-center.html" class="text-white/70 hover:text-white text-sm">Help</a>
                <a href="faqs.html" class="text-white/70 hover:text-white text-sm">FAQs</a>
            </div>

            <div class="mt-4 md:mt-0 text-white/50 text-sm">
                © 2025 Veltrix. All rights reserved.
            </div>
        </div>
    </div>
</footer>
<?php $this->endSection(); ?>


<?php $this->section('pageScripts'); ?>
<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("loginForm", () => ({
            email: '',
            password: '',
            rememberMe: false,
            errors: {},

            validateForm(event) {
                this.errors = {};
                let valid = true;

                if (!this.email.trim()) {
                    this.errors.email = 'Email is required';
                    valid = false;
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.email)) {
                    this.errors.email = 'Please enter a valid email';
                    valid = false;
                }

                if (!this.password) {
                    this.errors.password = 'Password is required';
                    valid = false;
                }

                if (valid) {
                    event.target.submit()
                }
            },
        }))
    })
</script>
<?php $this->endSection(); ?>