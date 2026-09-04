    <!-- Modal -->
    <div id="glosario-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/70 backdrop-blur-sm" id="glosario-modal-backdrop"></div>
        <div
            class="relative w-full max-w-lg bg-slate-900 border border-slate-700 rounded-2xl shadow-2xl p-6 sm:p-8 max-h-[85vh] overflow-y-auto">
            <button type="button" id="glosario-modal-close"
                class="absolute top-4 right-4 w-8 h-8 flex items-center justify-center rounded-full text-slate-400 hover:text-white hover:bg-slate-800 transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="space-y-4">
                <div class="flex items-start gap-4">
                    <div id="modal-icon" class="shrink-0 w-14 h-14 rounded-xl flex items-center justify-center"></div>
                    <div class="space-y-2 min-w-0">
                        <h2 id="modal-term" class="text-2xl font-extrabold text-white leading-tight"></h2>
                        <span id="modal-badge"
                            class="inline-block px-3 py-1 rounded-full text-xs font-semibold border"></span>
                    </div>
                </div>
                <p id="modal-definition" class="text-slate-300 leading-relaxed"></p>
                <a id="modal-link" href="#"
                    class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:underline">
                    Ver ficha completa
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
