<?php $this->extend("layouts/home"); ?>

<?php $this->section('pageStyles'); ?>
<style>
    .gradient-bg {
        background: linear-gradient(135deg, #8B5CF6 0%, #6D28D9 100%);
    }

    .purple-glow {
        box-shadow: 0 0 20px rgba(139, 92, 246, 0.5);
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(139, 92, 246, 0.2);
    }

    .wave-pattern {
        background-image: url("data:image/svg+xml,%3Csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3E%3Cdefs%3E%3Cpattern id='wave' width='100' height='20' patternUnits='userSpaceOnUse'%3E%3Cpath d='M0 10 Q 12.5 0, 25 10 T 50 10 T 75 10 T 100 10' stroke='%238B5CF6' stroke-width='1' fill='none' stroke-opacity='0.1'/%3E%3C/pattern%3E%3C/defs%3E%3Crect width='100%25' height='100%25' fill='url(%23wave)'/%3E%3C/svg%3E");
    }

    .dots-pattern {
        background-image: url("data:image/svg+xml,%3Csvg width='20' height='20' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='2' cy='2' r='1' fill='%238B5CF6' fill-opacity='0.1'/%3E%3C/svg%3E");
    }

    .highlight-text {
        background: linear-gradient(120deg, rgba(192, 132, 252, 0.2) 0%, rgba(192, 132, 252, 0) 100%);
        padding: 0.2em 0.1em;
    }

    .note-card {
        background: white;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        padding: 1rem;
        position: relative;
    }

    .note-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 1rem;
        width: 2rem;
        height: 0.5rem;
        background: #8B5CF6;
        border-radius: 0 0 0.5rem 0.5rem;
    }

    .typing-animation::after {
        content: '|';
        animation: blink 1s step-end infinite;
    }

    @keyframes blink {

        from,
        to {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }
    }

    .dark {
        background-color: #1F2937;
        color: #F9FAFB;
    }
</style>
<?php $this->endSection(); ?>


<?php $this->section('content'); ?>
<!-- Navbar -->
<nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md shadow-sm">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <div class="flex items-center">
            <div class="w-10 h-10 rounded-lg gradient-bg flex items-center justify-center mr-2">
                <span class="text-white font-bold text-xl">V</span>
            </div>
            <span class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">Veltrix</span>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center space-x-8">
            <a href="#how-it-works" class="font-medium hover:text-primary transition-colors">How It Works</a>
            <a href="#features" class="font-medium hover:text-primary transition-colors">Features</a>
            <a href="#why-veltrix" class="font-medium hover:text-primary transition-colors">Why Veltrix?</a>
            <a href="#testimonials" class="font-medium hover:text-primary transition-colors">Testimonials</a>
            <a href="#cta" class="btn btn-primary rounded-full px-6 text-white">Get Started Free</a>
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
                <a href="#how-it-works" class="block px-4 py-2 hover:bg-base-200">How It Works</a>
                <a href="#features" class="block px-4 py-2 hover:bg-base-200">Features</a>
                <a href="#why-veltrix" class="block px-4 py-2 hover:bg-base-200">Why Veltrix?</a>
                <a href="#testimonials" class="block px-4 py-2 hover:bg-base-200">Testimonials</a>
                <a href="#cta" class="block px-4 py-2 text-primary font-medium">Get Started Free</a>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="relative wave-pattern min-h-[90vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-white/95 to-white/90"></div>

    <!-- Animated Floating Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/5 w-64 h-64 bg-primary/10 rounded-full filter blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-1/3 right-1/4 w-96 h-96 bg-secondary/10 rounded-full filter blur-3xl animate-pulse-slow" style="animation-delay: 1s;"></div>
        <div class="absolute top-2/3 left-1/3 w-48 h-48 bg-accent/10 rounded-full filter blur-3xl animate-pulse-slow" style="animation-delay: 2s;"></div>
    </div>

    <div class="container mx-auto px-4 py-20 relative z-10">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-8">
                <h1 class="text-4xl md:text-6xl font-bold leading-tight">
                    <span class="block">Study Smarter,</span>
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">Not Harder</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-600 max-w-lg">
                    Veltrix transforms your study materials into concise, AI-powered notes. Save time and boost your learning efficiency.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#cta" class="btn btn-primary btn-lg rounded-full text-white purple-glow">
                        Get Started Free
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#how-it-works" class="btn btn-outline btn-lg rounded-full">
                        See How It Works
                    </a>
                </div>
                <div class="flex items-center gap-2 text-sm text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <span>No credit card required</span>
                    <span class="mx-2">•</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <span>Free for students</span>
                </div>
            </div>
            <div class="relative" x-data="{ hover: false }">
                <div class="relative z-10 animate-float" @mouseenter="hover = true" @mouseleave="hover = false">
                    <!-- AI Note Generator Demo -->
                    <div class="bg-white rounded-xl shadow-xl overflow-hidden transition-all duration-500" :class="{ 'scale-105': hover }">
                        <!-- Demo Header -->
                        <div class="bg-gray-100 p-3 flex items-center justify-between border-b">
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 rounded-full bg-red-400"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                                <div class="w-3 h-3 rounded-full bg-green-400"></div>
                            </div>
                            <div class="text-xs font-medium text-gray-500">Veltrix Note Generator</div>
                            <div class="w-5"></div>
                        </div>

                        <!-- Demo Content -->
                        <div class="p-4">
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Upload Study Material</label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-gray-400 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <p class="text-sm text-gray-500">Drag & drop your PDF or lecture notes</p>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="flex justify-between items-center mb-2">
                                    <label class="block text-sm font-medium text-gray-700">AI-Generated Notes</label>
                                    <span class="text-xs text-primary">Generating...</span>
                                </div>
                                <div class="border border-gray-200 rounded-lg p-3 bg-gray-50">
                                    <div class="space-y-2">
                                        <h3 class="font-bold text-sm" x-data="{ text: 'Photosynthesis: Key Concepts' }" x-init="setTimeout(() => { text = 'Photosynthesis: Key Concepts' }, 1000)">
                                            <span x-text="text" class="typing-animation"></span>
                                        </h3>
                                        <ul class="text-sm space-y-1 text-gray-700">
                                            <li x-data="{ visible: false }" x-init="setTimeout(() => { visible = true }, 1500)" x-show="visible" x-transition>• Process where plants convert light energy into chemical energy</li>
                                            <li x-data="{ visible: false }" x-init="setTimeout(() => { visible = true }, 2500)" x-show="visible" x-transition>• Occurs in chloroplasts containing chlorophyll</li>
                                            <li x-data="{ visible: false }" x-init="setTimeout(() => { visible = true }, 3500)" x-show="visible" x-transition>• Equation: 6CO₂ + 6H₂O + light → C₆H₁₂O₆ + 6O₂</li>
                                            <li x-data="{ visible: false }" x-init="setTimeout(() => { visible = true }, 4500)" x-show="visible" x-transition>• Two stages: Light-dependent and Calvin cycle</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end gap-2">
                                <button class="btn btn-sm btn-outline">Edit</button>
                                <button class="btn btn-sm btn-primary">Save Note</button>
                            </div>
                        </div>
                    </div>

                    <!-- Badge -->
                    <div class="absolute -bottom-6 -right-4 w-24 h-24 rounded-full gradient-bg flex items-center justify-center text-white font-bold text-lg purple-glow">
                        AI-Powered
                    </div>
                </div>
                <div class="absolute -z-10 top-8 left-8 w-full h-full rounded-xl bg-accent/20 blur-xl"></div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section id="how-it-works" class="py-20 bg-base-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">How Veltrix Works</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Transform your study materials into concise, easy-to-understand notes in just three simple steps
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            <!-- Step 1 -->
            <div class="relative" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                <div class="absolute -top-6 -left-6 w-12 h-12 rounded-full gradient-bg flex items-center justify-center text-white font-bold text-xl z-10">
                    1
                </div>
                <div class="h-full bg-white rounded-xl p-6 shadow-lg transition-all duration-300 relative z-0" :class="{ 'translate-y-[-5px] shadow-xl': hover }">
                    <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center mb-6 mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-center">Upload Material</h3>
                    <p class="text-gray-600 text-center">
                        Upload your lecture notes, textbooks, or study materials in PDF, Word, or image format.
                    </p>
                </div>
                <div class="hidden md:block absolute top-1/2 -right-4 transform -translate-y-1/2 z-20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="relative" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                <div class="absolute -top-6 -left-6 w-12 h-12 rounded-full gradient-bg flex items-center justify-center text-white font-bold text-xl z-10">
                    2
                </div>
                <div class="h-full bg-white rounded-xl p-6 shadow-lg transition-all duration-300 relative z-0" :class="{ 'translate-y-[-5px] shadow-xl': hover }">
                    <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center mb-6 mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-center">AI Processing</h3>
                    <p class="text-gray-600 text-center">
                        Our advanced AI analyzes your content and extracts the most important concepts and information.
                    </p>
                </div>
                <div class="hidden md:block absolute top-1/2 -right-4 transform -translate-y-1/2 z-20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="relative" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                <div class="absolute -top-6 -left-6 w-12 h-12 rounded-full gradient-bg flex items-center justify-center text-white font-bold text-xl z-10">
                    3
                </div>
                <div class="h-full bg-white rounded-xl p-6 shadow-lg transition-all duration-300 relative z-0" :class="{ 'translate-y-[-5px] shadow-xl': hover }">
                    <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center mb-6 mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-center">Get Smart Notes</h3>
                    <p class="text-gray-600 text-center">
                        Review, edit, and save your AI-generated study notes. Access them anytime, anywhere.
                    </p>
                </div>
            </div>
        </div>

        <!-- Sample Note -->
        <div class="mt-20 max-w-3xl mx-auto">
            <h3 class="text-2xl font-bold mb-6 text-center">Sample AI-Generated Note</h3>

            <div class="note-card" x-data="{ tab: 'biology' }">
                <div class="flex border-b mb-4">
                    <button @click="tab = 'biology'" class="px-4 py-2 font-medium" :class="tab === 'biology' ? 'text-primary border-b-2 border-primary' : 'text-gray-500'">Biology</button>
                    <button @click="tab = 'history'" class="px-4 py-2 font-medium" :class="tab === 'history' ? 'text-primary border-b-2 border-primary' : 'text-gray-500'">History</button>
                    <button @click="tab = 'math'" class="px-4 py-2 font-medium" :class="tab === 'math' ? 'text-primary border-b-2 border-primary' : 'text-gray-500'">Math</button>
                </div>

                <!-- Biology Note -->
                <div x-show="tab === 'biology'" class="space-y-4">
                    <h4 class="text-xl font-bold">Cell Structure and Function</h4>
                    <div class="space-y-2 text-gray-700">
                        <p class="font-medium">Key Components:</p>
                        <ul class="list-disc pl-5 space-y-1">
                            <li><span class="font-medium">Cell Membrane:</span> Selectively permeable barrier that controls what enters and exits the cell</li>
                            <li><span class="font-medium">Nucleus:</span> Contains genetic material (DNA) and controls cell activities</li>
                            <li><span class="font-medium">Mitochondria:</span> Powerhouse of the cell; produces ATP through cellular respiration</li>
                            <li><span class="font-medium">Endoplasmic Reticulum:</span> Transport network for molecules; rough ER has ribosomes for protein synthesis</li>
                        </ul>
                        <p class="font-medium mt-3">Cell Types:</p>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="font-medium text-primary">Prokaryotic</p>
                                <ul class="list-disc pl-5 text-sm">
                                    <li>No nucleus or membrane-bound organelles</li>
                                    <li>Example: Bacteria</li>
                                </ul>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="font-medium text-primary">Eukaryotic</p>
                                <ul class="list-disc pl-5 text-sm">
                                    <li>Has nucleus and membrane-bound organelles</li>
                                    <li>Example: Animal and plant cells</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- History Note -->
                <div x-show="tab === 'history'" class="space-y-4">
                    <h4 class="text-xl font-bold">Industrial Revolution (1760-1840)</h4>
                    <div class="space-y-2 text-gray-700">
                        <p class="font-medium">Key Developments:</p>
                        <ul class="list-disc pl-5 space-y-1">
                            <li><span class="font-medium">Mechanization:</span> Transition from hand production to machine manufacturing</li>
                            <li><span class="font-medium">Steam Power:</span> James Watt's improved steam engine (1776) revolutionized manufacturing</li>
                            <li><span class="font-medium">Textile Industry:</span> Flying shuttle, spinning jenny, and power loom increased production</li>
                            <li><span class="font-medium">Transportation:</span> Steam locomotives and railways improved movement of goods</li>
                        </ul>
                        <p class="font-medium mt-3">Social Impact:</p>
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <ul class="list-disc pl-5">
                                <li>Urbanization - mass migration from rural to urban areas</li>
                                <li>Working conditions - long hours, low wages, child labor</li>
                                <li>Rise of middle class and new social hierarchies</li>
                                <li>Labor movements and early unionization efforts</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Math Note -->
                <div x-show="tab === 'math'" class="space-y-4">
                    <h4 class="text-xl font-bold">Calculus: Derivatives</h4>
                    <div class="space-y-2 text-gray-700">
                        <p class="font-medium">Key Concepts:</p>
                        <ul class="list-disc pl-5 space-y-1">
                            <li><span class="font-medium">Definition:</span> The derivative measures the rate of change of a function with respect to a variable</li>
                            <li><span class="font-medium">Notation:</span> f'(x), dy/dx, or d/dx[f(x)]</li>
                            <li><span class="font-medium">Power Rule:</span> d/dx[x^n] = n·x^(n-1)</li>
                            <li><span class="font-medium">Chain Rule:</span> d/dx[f(g(x))] = f'(g(x))·g'(x)</li>
                        </ul>
                        <p class="font-medium mt-3">Common Derivatives:</p>
                        <div class="grid grid-cols-2 gap-2 bg-gray-50 p-3 rounded-lg">
                            <div>d/dx[sin(x)] = cos(x)</div>
                            <div>d/dx[cos(x)] = -sin(x)</div>
                            <div>d/dx[e^x] = e^x</div>
                            <div>d/dx[ln(x)] = 1/x</div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end mt-4 gap-2">
                    <button class="btn btn-sm btn-outline">Edit Note</button>
                    <button class="btn btn-sm btn-primary">Save to Library</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-20 bg-base-200 dots-pattern relative">
    <div class="absolute inset-0 bg-gradient-to-b from-base-200/95 to-base-200/90"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Powerful Study Features</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Tools designed to make your study sessions more productive and effective
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature 1 -->
            <div class="feature-card bg-white rounded-xl p-6 shadow-lg transition-all duration-300" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                <div class="w-14 h-14 rounded-full gradient-bg flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">AI Note Generation</h3>
                <p class="text-gray-600">
                    Transform lengthy study materials into concise, easy-to-understand notes in seconds.
                </p>
                <div class="mt-4 overflow-hidden h-1">
                    <div class="w-full h-full bg-primary/20 rounded-full">
                        <div class="h-full gradient-bg rounded-full transition-all duration-700" :class="hover ? 'w-full' : 'w-0'"></div>
                    </div>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="feature-card bg-white rounded-xl p-6 shadow-lg transition-all duration-300" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                <div class="w-14 h-14 rounded-full gradient-bg flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Smart Editor</h3>
                <p class="text-gray-600">
                    Customize and edit your AI-generated notes with our intuitive text editor.
                </p>
                <div class="mt-4 overflow-hidden h-1">
                    <div class="w-full h-full bg-primary/20 rounded-full">
                        <div class="h-full gradient-bg rounded-full transition-all duration-700" :class="hover ? 'w-full' : 'w-0'"></div>
                    </div>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="feature-card bg-white rounded-xl p-6 shadow-lg transition-all duration-300" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                <div class="w-14 h-14 rounded-full gradient-bg flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Study Library</h3>
                <p class="text-gray-600">
                    Organize and access all your notes in one place, categorized by subject and topic.
                </p>
                <div class="mt-4 overflow-hidden h-1">
                    <div class="w-full h-full bg-primary/20 rounded-full">
                        <div class="h-full gradient-bg rounded-full transition-all duration-700" :class="hover ? 'w-full' : 'w-0'"></div>
                    </div>
                </div>
            </div>

            <!-- Feature 4 -->
            <div class="feature-card bg-white rounded-xl p-6 shadow-lg transition-all duration-300" x-data="{ hover: false, darkMode: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                <div class="w-14 h-14 rounded-full gradient-bg flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Dark Mode</h3>
                <p class="text-gray-600">
                    Study comfortably day or night with our eye-friendly dark mode option.
                </p>
                <div class="mt-4 flex items-center justify-between">
                    <span class="text-xs text-gray-500">Light</span>
                    <button @click="darkMode = !darkMode" class="relative inline-flex items-center h-6 rounded-full w-11 transition-colors focus:outline-none" :class="darkMode ? 'bg-primary' : 'bg-gray-300'">
                        <span class="inline-block w-4 h-4 transform transition-transform bg-white rounded-full" :class="darkMode ? 'translate-x-6' : 'translate-x-1'"></span>
                    </button>
                    <span class="text-xs text-gray-500">Dark</span>
                </div>
            </div>
        </div>

        <!-- Additional Features -->
        <div class="grid md:grid-cols-3 gap-6 mt-12">
            <div class="bg-white p-4 rounded-lg shadow flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium">Mobile Access</h4>
                    <p class="text-sm text-gray-600">Study on any device, anywhere</p>
                </div>
            </div>

            <div class="bg-white p-4 rounded-lg shadow flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium">Easy Sharing</h4>
                    <p class="text-sm text-gray-600">Share notes with classmates</p>
                </div>
            </div>

            <div class="bg-white p-4 rounded-lg shadow flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium">Flashcard Creation</h4>
                    <p class="text-sm text-gray-600">Convert notes to study flashcards</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Veltrix Section -->
<section id="why-veltrix" class="py-20 bg-base-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Why Choose Veltrix?</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                See how Veltrix transforms your study experience compared to traditional methods
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-12 max-w-5xl mx-auto">
            <!-- Traditional Method -->
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold">Traditional Note-Taking</h3>
                </div>

                <ul class="space-y-4">
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mt-0.5 mr-2 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <span class="font-medium">Time-Consuming</span>
                            <p class="text-sm text-gray-600">Hours spent reading and manually taking notes</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mt-0.5 mr-2 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <span class="font-medium">Inconsistent Quality</span>
                            <p class="text-sm text-gray-600">Notes vary based on focus, energy, and understanding</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mt-0.5 mr-2 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <span class="font-medium">Disorganized</span>
                            <p class="text-sm text-gray-600">Difficult to find specific information later</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mt-0.5 mr-2 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <span class="font-medium">Limited Accessibility</span>
                            <p class="text-sm text-gray-600">Physical notes can be lost or forgotten</p>
                        </div>
                    </li>
                </ul>

                <div class="mt-6 p-4 bg-gray-100 rounded-lg">
                    <div class="flex items-center justify-between">
                        <span class="font-medium">Efficiency</span>
                        <div class="w-32 h-3 bg-gray-300 rounded-full overflow-hidden">
                            <div class="w-1/3 h-full bg-gray-500"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Veltrix Method -->
            <div class="bg-white rounded-xl shadow-lg p-6 border-2 border-primary/30 relative">
                <div class="absolute -top-3 -right-3 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full">
                    RECOMMENDED
                </div>

                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 rounded-full gradient-bg flex items-center justify-center mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold">Veltrix AI Notes</h3>
                </div>

                <ul class="space-y-4">
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 mr-2 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <span class="font-medium">Ultra-Fast</span>
                            <p class="text-sm text-gray-600">Generate comprehensive notes in seconds</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 mr-2 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <span class="font-medium">Consistent Quality</span>
                            <p class="text-sm text-gray-600">AI ensures high-quality notes every time</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 mr-2 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <span class="font-medium">Well-Organized</span>
                            <p class="text-sm text-gray-600">Structured format with clear headings and bullet points</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 mr-2 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <span class="font-medium">Always Accessible</span>
                            <p class="text-sm text-gray-600">Cloud storage means your notes are available anywhere</p>
                        </div>
                    </li>
                </ul>

                <div class="mt-6 p-4 bg-primary/10 rounded-lg">
                    <div class="flex items-center justify-between">
                        <span class="font-medium">Efficiency</span>
                        <div class="w-32 h-3 bg-primary/20 rounded-full overflow-hidden">
                            <div class="w-11/12 h-full gradient-bg"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-16">
            <div class="bg-white rounded-lg shadow p-6 text-center">
                <div class="text-4xl font-bold text-primary mb-2">85%</div>
                <p class="text-gray-600">Time Saved</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 text-center">
                <div class="text-4xl font-bold text-primary mb-2">93%</div>
                <p class="text-gray-600">Student Satisfaction</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 text-center">
                <div class="text-4xl font-bold text-primary mb-2">10K+</div>
                <p class="text-gray-600">Active Users</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 text-center">
                <div class="text-4xl font-bold text-primary mb-2">4.8/5</div>
                <p class="text-gray-600">Average Rating</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-20 bg-base-200 dots-pattern relative">
    <div class="absolute inset-0 bg-gradient-to-b from-base-200/95 to-base-200/90"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">What Students Say</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Hear from students who have transformed their study habits with Veltrix
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8" x-data="{ activeTestimonial: 0 }">
            <!-- Testimonial 1 -->
            <div class="bg-white rounded-xl p-6 shadow-lg relative"
                :class="{ 'ring-2 ring-primary scale-105': activeTestimonial === 0 }"
                @mouseenter="activeTestimonial = 0">
                <div class="absolute -top-5 left-6">
                    <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center text-white font-bold">
                        "
                    </div>
                </div>
                <div class="pt-6">
                    <p class="text-gray-600 mb-6">
                        Veltrix has been a game-changer for my med school studies. I can upload dense anatomy texts and get clear, concise notes that help me understand complex concepts quickly.
                    </p>
                    <div class="flex items-center">
                        <img src="/placeholder.svg?height=50&width=50" alt="Alex Chen" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold">Alex Chen</h4>
                            <p class="text-sm text-gray-500">Medical Student, Stanford</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-white rounded-xl p-6 shadow-lg relative"
                :class="{ 'ring-2 ring-primary scale-105': activeTestimonial === 1 }"
                @mouseenter="activeTestimonial = 1">
                <div class="absolute -top-5 left-6">
                    <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center text-white font-bold">
                        "
                    </div>
                </div>
                <div class="pt-6">
                    <p class="text-gray-600 mb-6">
                        As a history major with tons of reading assignments, Veltrix helps me extract key dates, events, and concepts from lengthy texts. It's like having a personal research assistant!
                    </p>
                    <div class="flex items-center">
                        <img src="/placeholder.svg?height=50&width=50" alt="Sophia Rodriguez" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold">Sophia Rodriguez</h4>
                            <p class="text-sm text-gray-500">History Major, NYU</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-white rounded-xl p-6 shadow-lg relative"
                :class="{ 'ring-2 ring-primary scale-105': activeTestimonial === 2 }"
                @mouseenter="activeTestimonial = 2">
                <div class="absolute -top-5 left-6">
                    <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center text-white font-bold">
                        "
                    </div>
                </div>
                <div class="pt-6">
                    <p class="text-gray-600 mb-6">
                        I use Veltrix to summarize my computer science textbooks and lecture notes. The AI does an amazing job of simplifying complex algorithms and programming concepts into digestible notes.
                    </p>
                    <div class="flex items-center">
                        <img src="/placeholder.svg?height=50&width=50" alt="Jamal Washington" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold">Jamal Washington</h4>
                            <p class="text-sm text-gray-500">CS Student, MIT</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center mt-12">
            <div class="stats shadow">
                <div class="stat place-items-center">
                    <div class="stat-title">Study Time Saved</div>
                    <div class="stat-value text-primary">2.5M+</div>
                    <div class="stat-desc">Hours</div>
                </div>
                <div class="stat place-items-center">
                    <div class="stat-title">Notes Generated</div>
                    <div class="stat-value text-secondary">850K+</div>
                    <div class="stat-desc">And counting</div>
                </div>
                <div class="stat place-items-center">
                    <div class="stat-title">Student Users</div>
                    <div class="stat-value">10K+</div>
                    <div class="stat-desc">From 120+ universities</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section id="cta" class="py-20 gradient-bg text-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-5xl font-bold mb-6">Ready to Transform Your Study Habits?</h2>
            <p class="text-lg md:text-xl mb-8 text-white/80">
                Join thousands of students who are studying smarter, not harder, with Veltrix AI-powered notes.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
                <a href="#" class="btn btn-lg bg-white text-primary hover:bg-white/90 rounded-full px-8 shadow-lg">
                    Get Started Free
                </a>
                <a href="#" class="btn btn-lg btn-outline border-white text-white hover:bg-white/20 rounded-full px-8">
                    Watch Demo
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-12">
                <div class="flex flex-col items-center">
                    <div class="text-4xl font-bold">Free</div>
                    <div class="text-white/80">For Students</div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="text-4xl font-bold">24/7</div>
                    <div class="text-white/80">Support</div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="text-4xl font-bold">No</div>
                    <div class="text-white/80">Credit Card</div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="text-4xl font-bold">100%</div>
                    <div class="text-white/80">Satisfaction</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-neutral text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-4 gap-8">
            <div>
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 rounded-lg gradient-bg flex items-center justify-center mr-2">
                        <span class="text-white font-bold text-xl">V</span>
                    </div>
                    <span class="text-2xl font-bold text-white">Veltrix</span>
                </div>
                <p class="text-white/70 mb-4">
                    AI-powered study notes to help students learn more efficiently.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-white/70 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg>
                    </a>
                    <a href="#" class="text-white/70 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                    <a href="#" class="text-white/70 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                        </svg>
                    </a>
                    <a href="#" class="text-white/70 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z" />
                        </svg>
                    </a>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-bold mb-4">Product</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-white/70 hover:text-white">Features</a></li>
                    <li><a href="#" class="text-white/70 hover:text-white">Pricing</a></li>
                    <li><a href="#" class="text-white/70 hover:text-white">Case Studies</a></li>
                    <li><a href="#" class="text-white/70 hover:text-white">Reviews</a></li>
                    <li><a href="#" class="text-white/70 hover:text-white">Updates</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-bold mb-4">Resources</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-white/70 hover:text-white">Study Tips</a></li>
                    <li><a href="#" class="text-white/70 hover:text-white">Blog</a></li>
                    <li><a href="#" class="text-white/70 hover:text-white">Help Center</a></li>
                    <li><a href="#" class="text-white/70 hover:text-white">Tutorials</a></li>
                    <li><a href="#" class="text-white/70 hover:text-white">Contact</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-bold mb-4">Subscribe</h3>
                <p class="text-white/70 mb-4">Get study tips and Veltrix updates in your inbox.</p>
                <div class="flex">
                    <input type="email" placeholder="Your email" class="input input-bordered text-black rounded-r-none w-full">
                    <button class="btn btn-primary rounded-l-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="border-t border-white/20 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p class="text-white/50 text-sm">© 2025 Veltrix. All rights reserved.</p>
            <div class="flex space-x-6 mt-4 md:mt-0">
                <a href="#" class="text-white/50 hover:text-white text-sm">Privacy Policy</a>
                <a href="#" class="text-white/50 hover:text-white text-sm">Terms of Service</a>
                <a href="#" class="text-white/50 hover:text-white text-sm">Cookies</a>
            </div>
        </div>
    </div>
</footer>

<!-- Back to top button -->
<button id="back-to-top" class="fixed bottom-6 right-6 btn btn-circle gradient-bg text-white shadow-lg opacity-0 invisible transition-all duration-300" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
    </svg>
</button>
<?php $this->endSection(); ?>


<?php $this->section('pageScripts'); ?>
<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("home", () => ({
            backToTopBtn() {
                window.addEventListener('scroll', function() {
                    const backToTopButton = document.getElementById('back-to-top');
                    if (window.scrollY > 300) {
                        backToTopButton.classList.remove('opacity-0', 'invisible');
                        backToTopButton.classList.add('opacity-100', 'visible');
                    } else {
                        backToTopButton.classList.remove('opacity-100', 'visible');
                        backToTopButton.classList.add('opacity-0', 'invisible');
                    }
                });
            },
            init() {
                this.backToTopBtn();
            }
        }))
    })
</script>
<?php $this->endSection(); ?>