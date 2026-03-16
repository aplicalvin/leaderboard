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
<div id="ig-story-template"
class="fixed -left-[9999px] top-0 flex flex-col items-center justify-between overflow-hidden"
style="
width:1080px;
height:1920px;
background: radial-gradient(circle at top,#0f172a,#020617);
font-family:'Outfit','PT Sans',sans-serif;
padding:140px 90px;
">

<!-- ambient gradient -->
<div class="absolute top-[-200px] left-[-200px] w-[700px] h-[700px] bg-blue-500/40 rounded-full blur-[200px]"></div>
<div class="absolute bottom-[-200px] right-[-200px] w-[600px] h-[600px] bg-purple-500/40 rounded-full blur-[200px]"></div>


<!-- HEADER -->
<div class="relative z-10 text-center">

<div class="text-[28px] tracking-[0.35em] uppercase text-blue-300 mb-6 font-bold">
DNCC 2026
</div>

<h2 class="text-[82px] font-black text-white leading-tight">
Leaderboard<br>
Score
</h2>

</div>



<!-- CARD -->
<div class="relative z-10 w-full max-w-[820px]
bg-white/8 backdrop-blur-xl
border border-white/10
rounded-[50px]
shadow-2xl
flex flex-col items-center
px-16 py-20">

<!-- AVATAR -->
<div class="relative mb-12">

<div class="absolute inset-0 rounded-full
bg-gradient-to-r from-cyan-400 to-blue-500
blur-[30px] opacity-70">
</div>

<div class="relative
w-[320px] h-[320px]
rounded-full
p-[6px]
bg-gradient-to-r from-cyan-400 to-blue-500">

<div class="w-full h-full rounded-full overflow-hidden border-[8px] border-[#020617]">
<img src="{{ $avatarBase64 }}" class="w-full h-full object-cover">
</div>

</div>
</div>


<!-- NAME -->
<h1 class="text-[72px] font-black text-white text-center mb-4">
{{ $member->name }}
</h1>

<div class="text-[28px] text-blue-200 font-bold mb-14 tracking-widest">
{{ $member->nim }}
</div>


<!-- STATS -->
<div class="flex gap-8 w-full">

<!-- RANK -->
<div class="flex-1
bg-white/5
border border-white/10
rounded-[28px]
p-10
text-center">

<div class="text-[20px] uppercase tracking-widest text-blue-300 mb-2">
Rank
</div>

<div class="text-[90px] font-black text-white">
#{{ $member->rank }}
</div>

</div>


<!-- SCORE -->
<div class="flex-1
bg-white/5
border border-white/10
rounded-[28px]
p-10
text-center">

<div class="text-[20px] uppercase tracking-widest text-blue-300 mb-2">
Points
</div>

<div class="text-[90px] font-black
text-transparent
bg-clip-text
bg-gradient-to-b
from-yellow-300
to-orange-500">

{{ number_format($member->points) }}

</div>

</div>

</div>

</div>



<!-- FOOTER -->
<div class="relative z-10 text-center">

<div class="text-[34px] font-bold text-white tracking-widest">
DNCC LEADERBOARD
</div>

<div class="text-[22px] text-blue-300 mt-2">
leaderboard.dncc.co.id
</div>

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
