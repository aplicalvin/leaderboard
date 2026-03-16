<link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700;900&display=swap" rel="stylesheet">

@php
    // To solve CORS issues rendering external avatars in html2canvas,
    // we fetch the image via PHP and encode it to base64.
    $avatarBase64 = $member->avatar;
    if (filter_var($member->avatar, FILTER_VALIDATE_URL)) {
        try {
            $context = stream_context_create([
                "ssl" => ["verify_peer" => false, "verify_peer_name" => false],
                "http" => ["timeout" => 3]
            ]);
            $imageData = @file_get_contents($member->avatar, false, $context);
            if ($imageData) {
                $avatarBase64 = 'data:image/jpeg;base64,' . base64_encode($imageData);
            }
        } catch (\Exception $e) {}
    }
@endphp

<!-- HIDDEN IG STORY TEMPLATE -->
<div id="ig-story-template" class="fixed -left-[9999px] top-0 flex flex-col items-center justify-between p-16 overflow-hidden" style="width:1080px;height:1920px;background:#030712;font-family:'Outfit', 'PT Sans', sans-serif;">
    
    <!-- Ambiance / Blobs -->
    <div class="absolute top-[-10%] left-[-20%] w-[800px] h-[800px] bg-[#0684ff] rounded-full mix-blend-screen filter blur-[150px] opacity-60"></div>
    <div class="absolute top-[20%] right-[-20%] w-[600px] h-[600px] bg-[#b537f2] rounded-full mix-blend-screen filter blur-[150px] opacity-40"></div>
    <div class="absolute bottom-[-10%] left-[10%] w-[700px] h-[700px] bg-[#00f3ff] rounded-full mix-blend-screen filter blur-[150px] opacity-30"></div>

    <!-- Top Branding -->
    <div class="relative z-10 w-full flex flex-col items-center mt-24">
        <div class="px-8 py-3 bg-white/10 backdrop-blur-md rounded-full border border-white/20 shadow-xl mb-6">
            <span class="text-[2rem] font-bold text-white tracking-[0.2em] uppercase">2026 Season</span>
        </div>
        <h2 class="text-[5.5rem] font-black text-transparent bg-clip-text bg-gradient-to-r from-white to-[#b5e7ff] tracking-tight leading-[1.1] drop-shadow-lg text-center">
            My DNCC<br/>Leaderboard Score
        </h2>
    </div>

    <!-- Main Glass Card -->
    <div class="relative z-10 w-full max-w-[900px] bg-white/10 backdrop-blur-2xl rounded-[3rem] border-2 border-white/20 shadow-[0_40px_100px_rgba(0,0,0,0.5)] flex flex-col items-center p-20 my-auto">
        
        <!-- Avatar Area -->
        <div class="relative mb-12">
            <!-- Glow ring -->
            <div class="absolute inset-0 rounded-full blur-[30px] opacity-100 bg-gradient-to-tr from-[#00f3ff] via-[#0684ff] to-[#b537f2] animate-pulse"></div>
            <!-- Avatar image -->
            <div class="relative w-[380px] h-[380px] rounded-full p-[8px] bg-gradient-to-tr from-[#00f3ff] via-[#0684ff] to-[#b537f2]">
                <div class="w-full h-full rounded-full overflow-hidden bg-[#0e2e5d] border-[8px] border-[#030712]">
                    <!-- Using base64 directly prevents html2canvas CORS issues -->
                    <img src="{{ $avatarBase64 }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                </div>
            </div>
        </div>

        <!-- Name & Badge -->
        <h1 class="text-[5.5rem] font-black text-white text-center leading-[1.1] mb-6 drop-shadow-md">
            {{ $member->name }}
        </h1>
        <div class="text-[2.5rem] font-bold text-[#b5e7ff] bg-[#0684ff]/30 px-10 py-4 rounded-full border border-[#0684ff]/50 shadow-inner mb-16">
            {{ $member->nim }}
        </div>

        <!-- Stats Grid -->
        <div class="flex w-full gap-8 mt-4">
            <!-- Rank Stat -->
            <div class="flex-1 bg-gradient-to-b from-white/10 to-transparent rounded-[2.5rem] p-12 text-center border border-white/10 shadow-lg relative overflow-hidden flex flex-col items-center justify-center">
                <div class="absolute inset-0 bg-gradient-to-tr from-yellow-500/10 to-transparent"></div>
                <div class="relative z-10 flex flex-col items-center">
                    <div class="text-[6rem] mb-6 drop-shadow-[0_0_30px_rgba(255,215,0,0.6)]">👑</div>
                    <div class="text-[2.2rem] text-[#b5e7ff] font-bold uppercase tracking-widest mb-2 opacity-90">Global Rank</div>
                    <div class="text-[8rem] font-black leading-none text-white drop-shadow-lg">
                        #{{ $member->rank }}
                    </div>
                </div>
            </div>

            <!-- Score Stat -->
            <div class="flex-1 bg-gradient-to-b from-white/10 to-transparent rounded-[2.5rem] p-12 text-center border border-white/10 shadow-lg relative overflow-hidden flex flex-col items-center justify-center">
                <div class="absolute inset-0 bg-gradient-to-tr from-orange-500/10 to-transparent"></div>
                <div class="relative z-10 flex flex-col items-center">
                    <div class="text-[6rem] mb-6 drop-shadow-[0_0_30px_rgba(255,165,0,0.6)]">🏆</div>
                    <div class="text-[2.2rem] text-[#b5e7ff] font-bold uppercase tracking-widest mb-2 opacity-90">Total Poin</div>
                    <div class="text-[8rem] font-black leading-none text-transparent bg-clip-text bg-gradient-to-b from-[#ffea00] to-[#ff7b00] drop-shadow-md">
                        {{ number_format($member->points) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Branding -->
    <div class="relative z-10 text-center mb-16 mt-8 flex flex-col items-center gap-4">
        <div class="w-16 h-1 bg-white/30 rounded-full mb-4"></div>
        <p class="text-[3rem] font-black text-white tracking-widest flex items-center gap-4 drop-shadow-md">
            DNCC
            <span class="text-[#0684ff] font-light">|</span>
            LEADERBOARD
        </p>
        <p class="text-[2.2rem] font-bold text-[#b5e7ff]/70 tracking-wider">
            leaderboard.dncc.co.id
        </p>
    </div>
</div>

@push('scripts')
<script>
    async function downloadIGStory() {
        const btn = event.currentTarget;
        const btnText = btn.querySelector('span');
        const originalText = btnText.innerHTML;
        
        try {
            btnText.innerHTML = `Memproses...`;
            btn.classList.add('opacity-75', 'cursor-not-allowed', 'animate-pulse');
            btn.disabled = true;
            
            await new Promise(resolve => setTimeout(resolve, 100)); // allow DOM refresh
            
            const element = document.getElementById('ig-story-template');
            
            const canvas = await html2canvas(element, {
                scale: 1, 
                useCORS: true, 
                allowTaint: true,
                backgroundColor: '#030712', 
                logging: false,
                width: 1080,
                height: 1920
            });
            
            const url = canvas.toDataURL('image/png', 1.0);
            
            const link = document.createElement('a');
            link.download = `DNCC-Score-{{ Str::slug($member->name) }}.png`;
            link.href = url;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            
        } catch (err) {
            console.error('Failed to generate image', err);
            alert('Waduh, gagal bikin gambarnya nih. Coba lagi yuk!');
        } finally {
            btnText.innerHTML = originalText;
            btn.classList.remove('opacity-75', 'cursor-not-allowed', 'animate-pulse');
            btn.disabled = false;
        }
    }
</script>
@endpush
