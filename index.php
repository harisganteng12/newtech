<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Newtech Alpha | Pro Terminal</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="layout">
    <aside class="sidebar">
        <div class="brand"><i class="fas fa-cube"></i> NEWTECH</div>
        <ul class="nav-menu">
            <li class="nav-item active" onclick="nav('dashboard', this)"><i class="fas fa-chart-line"></i> Analytics Hub</li>
            <li class="nav-item" onclick="nav('swap', this)"><i class="fas fa-random"></i> Liquidity Swap</li>
            <li class="nav-item" onclick="nav('risk', this)"><i class="fas fa-calculator"></i> Risk Calculator</li>
        </ul>

        <div id="auth-sidebar" style="margin-top: auto;"></div>
    </aside>

    <main class="main-content">
        <section id="dashboard" class="page active">
            <div class="stat-row">
                <div class="stat-card"><label>Net Worth</label><h2>$124,084.12</h2></div>
                <div class="stat-card"><label>24h P&L</label><h2 style="color:var(--success)">+$4,210.00</h2></div>
                <div class="stat-card"><label>Gas Price</label><h2 style="color:#fbbf24">18 Gwei</h2></div>
            </div>

            <div class="grid-main">
                <div class="left-col">
                    <div class="card" style="padding:0; overflow:hidden;">
                        <div style="position:relative; padding-bottom:56.25%; height:0;">
                            <iframe style="position:absolute; top:0; left:0; width:100%; height:100%; border:none;" src="https://www.youtube.com/embed/dQw4w9WgXcQ"></iframe>
                        </div>
                    </div>
                    <div class="card">
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            <h3>Equity Performance</h3>
                            <div style="display:flex; gap:8px;">
                                <button class="btn-tab" onclick="updateChartData(1)">1D</button>
                                <button class="btn-tab active" onclick="updateChartData(30)">1M</button>
                            </div>
                        </div>
                        <div style="height:300px; margin-top:20px;"><canvas id="mainChart"></canvas></div>
                    </div>
                </div>

                <div class="right-col">
                    <div class="card">
                        <h3>Asset Inventory</h3>
                        <table>
                            <thead><tr><th>ASSET</th><th>VALUE</th></tr></thead>
                            <tbody>
                                <tr><td><i class="fab fa-bitcoin" style="color:#f3ba2f"></i> BTC</td><td>$54,200</td></tr>
                                <tr><td><i class="fab fa-ethereum" style="color:#627eea"></i> ETH</td><td>$42,100</td></tr>
                                <tr><td><i class="fas fa-dollar-sign" style="color:#26a17b"></i> USDT</td><td>$27,784</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card">
                        <h3>Market Alpha</h3>
                        <label>Sentiment Index</label>
                        <div style="width:100%; height:8px; background:var(--bg-input); border-radius:10px; margin:10px 0;">
                            <div style="width:72%; height:100%; background:var(--accent); border-radius:10px;"></div>
                        </div>
                        <p style="font-size:0.75rem; color:var(--text-dim)">Currently: <b>72 (Greed)</b></p>
                    </div>
                </div>
            </div>
        </section>

        <section id="swap" class="page">
            <div class="card" style="max-width:480px; margin: 40px auto;">
                <div style="display:flex; justify-content:space-between; margin-bottom:20px;">
                    <h3>Swap Protocol</h3>
                </div>
                
                <div style="background:var(--bg-input); padding:20px; border-radius:15px; border:1px solid var(--border)">
                    <label>Sell</label>
                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <input type="number" id="swap-val" value="1.0" style="border:none; background:transparent; font-size:1.5rem; width:60%; margin-bottom:0;">
                        <span id="swap-from" style="font-weight:800">ETH</span>
                    </div>
                </div>
                
                <div style="text-align:center; margin:-15px 0; position:relative; z-index:5;">
                    <button onclick="flipTokens()" style="background:var(--accent); border:4px solid var(--bg-card); width:45px; height:45px; border-radius:12px; cursor:pointer;"><i class="fas fa-sync-alt"></i></button>
                </div>

                <div style="background:var(--bg-input); padding:20px; border-radius:15px; border:1px solid var(--border)">
                    <label>Buy</label>
                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <input type="number" value="3450.5" readonly style="border:none; background:transparent; font-size:1.5rem; width:60%; margin-bottom:0;">
                        <span id="swap-to" style="font-weight:800">USDT</span>
                    </div>
                </div>

                <button class="btn-action" id="swap-btn" style="margin-top:20px;">Connect Wallet to Swap</button>
            </div>
        </section>

        <section id="risk" class="page">
            <h2 style="margin-bottom:25px;">Strategic Risk Engine</h2>
            <div class="calc-grid">
                
                <div class="card">
                    <div style="background:var(--accent-dim); color:var(--accent); font-size:0.6rem; padding:4px 8px; border-radius:5px; display:inline-block; margin-bottom:10px;">SCALPING LOGIC</div>
                    <h4>Limited Leverage</h4>
                    <p style="font-size:0.7rem; color:var(--text-dim); margin-bottom:15px;">Target resiko fix dengan leverage terbatas.</p>
                    
                    <label>Total Wallet ($)</label><input type="number" id="c1-m" placeholder="1000" onkeydown="focusNext(event, 'c1-l')">
                    <label>Leverage (x)</label><input type="number" id="c1-l" placeholder="10" onkeydown="focusNext(event, 'c1-v')">
                    <label>Movement % (SL)</label><input type="number" id="c1-v" placeholder="1.5" onkeydown="focusNext(event, 'c1-r')">
                    <label>Risk Target ($)</label><input type="number" id="c1-r" placeholder="20" onkeydown="calculate(event, 1)">
                    
                    <div class="res-container" id="res1-box">
                        <div class="res-line"><span>Required Cost:</span> <span class="res-val" id="r1-cost">$0.00</span></div>
                        <div class="res-line"><span>Total Value:</span> <span class="res-val" id="r1-val">$0.00</span></div>
                        <div class="res-line"><span>Cutloss ROI:</span> <span class="res-val" style="color:var(--danger)" id="r1-sl">0%</span></div>
                        <div class="res-line"><span>TP (2R) ROI:</span> <span class="res-val" style="color:var(--success)" id="r1-tp">0%</span></div>
                        <div class="res-line"><span>Wallet After SL:</span> <span class="res-val" id="r1-after">$0.00</span></div>
                    </div>
                    <button class="btn-reset" onclick="resetC(1)">Reset</button>
                </div>

                <div class="card">
                    <div style="background:var(--accent-dim); color:var(--accent); font-size:0.6rem; padding:4px 8px; border-radius:5px; display:inline-block; margin-bottom:10px;">ROI STRATEGY</div>
                    <h4>ROI Based Risk</h4>
                    <p style="font-size:0.7rem; color:var(--text-dim); margin-bottom:15px;">Leverage disesuaikan target % resiko margin.</p>
                    
                    <label>Margin ($)</label><input type="number" id="c2-m" placeholder="500" onkeydown="focusNext(event, 'c2-rt')">
                    <label>Risk Target (% ROI)</label><input type="number" id="c2-rt" placeholder="5" onkeydown="focusNext(event, 'c2-v')">
                    <label>Movement % (SL)</label><input type="number" id="c2-v" placeholder="2" onkeydown="calculate(event, 2)">
                    
                    <div class="res-container" id="res2-box" style="margin-top:88px">
                        <div class="res-line"><span>Needed Leverage:</span> <span class="res-val" id="r2-lev">0.00x</span></div>
                        <div class="res-line"><span>Total Position:</span> <span class="res-val" id="r2-val">$0.00</span></div>
                        <div class="res-line"><span>TP 1 (1:1):</span> <span class="res-val" style="color:var(--success)" id="r2-tp1">0%</span></div>
                        <div class="res-line"><span>TP 2 (1:2):</span> <span class="res-val" style="color:var(--success)" id="r2-tp2">0%</span></div>
                        <div class="res-line"><span>Risk Amount:</span> <span class="res-val" style="color:var(--danger)" id="r2-amt">$0.00</span></div>
                    </div>
                    <button class="btn-reset" onclick="resetC(2)">Reset</button>
                </div>

                <div class="card">
                    <div style="background:var(--accent-dim); color:var(--accent); font-size:0.6rem; padding:4px 8px; border-radius:5px; display:inline-block; margin-bottom:10px;">VOLATILITY ALPHA</div>
                    <h4>Efficient Risk</h4>
                    <p style="font-size:0.7rem; color:var(--text-dim); margin-bottom:15px;">Leverage efisien berdasarkan volatilitas pasar.</p>
                    
                    <label>Margin ($)</label><input type="number" id="c3-m" placeholder="1000" onkeydown="focusNext(event, 'c3-v')">
                    <label>Volatility % (ATR)</label><input type="number" id="c3-v" placeholder="3.5" onkeydown="calculate(event, 3)">
                    
                    <div class="res-container" id="res3-box" style="margin-top:162px">
                        <div class="res-line"><span>Optimal Leverage:</span> <span class="res-val" id="r3-lev">0.00x</span></div>
                        <div class="res-line"><span>Max Value:</span> <span class="res-val" id="r3-val">$0.00</span></div>
                        <div class="res-line"><span>Liq. Point:</span> <span class="res-val" style="color:var(--danger)" id="r3-liq">0%</span></div>
                        <div class="res-line"><span>TP Target:</span> <span class="res-val" style="color:var(--success)" id="r3-tp">0%</span></div>
                    </div>
                    <button class="btn-reset" onclick="resetC(3)">Reset</button>
                </div>

            </div>
        </section>
    </main>
</div>

<script>
let walletConnected = false;

// AUTH ENGINE
function updateAuthUI() {
    const sidebarAuth = document.getElementById('auth-sidebar');
    const swapBtn = document.getElementById('swap-btn');
    
    if(!walletConnected) {
        sidebarAuth.innerHTML = `<div class="btn-auth disconnected" onclick="toggleWallet()"><i class="fas fa-wallet"></i> Connect Wallet</div>`;
        if(swapBtn) swapBtn.innerText = "Connect Wallet to Swap";
    } else {
        sidebarAuth.innerHTML = `
            <div style="padding:15px; border-radius:15px; background:rgba(255,255,255,0.03); border:1px solid var(--border)">
                <div style="display:flex; align-items:center; gap:10px; margin-bottom:10px;">
                    <div style="width:10px; height:10px; background:var(--success); border-radius:50%"></div>
                    <span style="font-size:0.8rem">0x71...a4f2</span>
                </div>
                <div class="btn-auth connected" onclick="toggleWallet()" style="font-size:0.75rem"><i class="fas fa-sign-out-alt"></i> Logout</div>
            </div>`;
        if(swapBtn) swapBtn.innerText = "Confirm Swap";
    }
}

function toggleWallet() {
    walletConnected = !walletConnected;
    updateAuthUI();
}

// NAVIGATION
function nav(id, el) {
    document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
    document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
    document.getElementById(id).classList.add('active');
    el.classList.add('active');
}

// CHART
const ctx = document.getElementById('mainChart').getContext('2d');
let myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['W1','W2','W3','W4'],
        datasets: [{
            data: [100000, 115000, 108000, 124084],
            borderColor: '#00d4ff', backgroundColor: 'rgba(0, 212, 255, 0.05)',
            fill: true, tension: 0.4, pointRadius: 0
        }]
    },
    options: {
        responsive: true, maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: { y: { display: false }, x: { grid: { display: false }, ticks: { color: '#94a3b8' } } }
    }
});

function updateChartData(p) {
    document.querySelectorAll('.btn-tab').forEach(b => b.classList.remove('active'));
    event.target.classList.add('active');
    myChart.data.datasets[0].data = p === 1 ? [121000, 122500, 123000, 124084] : [100000, 115000, 108000, 124084];
    myChart.update();
}

// RISK CALCULATOR ENGINE
function focusNext(e, id) {
    if(e.key === 'Enter') { e.preventDefault(); document.getElementById(id).focus(); }
}

function calculate(e, type) {
    if(e.key === 'Enter') {
        if(type === 1) {
            // Logic: Cost = Risk / (Lev * Move%)
            let m = parseFloat(document.getElementById('c1-m').value) || 0;
            let l = parseFloat(document.getElementById('c1-l').value) || 1;
            let v = parseFloat(document.getElementById('c1-v').value) || 0;
            let r = parseFloat(document.getElementById('c1-r').value) || 0;

            let cost = r / (l * (v / 100));
            let totalVal = cost * l;
            let slROI = v * l;

            document.getElementById('r1-cost').innerText = "$" + cost.toFixed(2);
            document.getElementById('r1-val').innerText = "$" + totalVal.toFixed(2);
            document.getElementById('r1-sl').innerText = "-" + slROI.toFixed(1) + "%";
            document.getElementById('r1-tp').innerText = "+" + (slROI * 2).toFixed(1) + "%";
            document.getElementById('r1-after').innerText = "$" + (m - r).toFixed(2);

        } else if(type === 2) {
            // Logic: Lev = TargetROI% / Move%
            let margin = parseFloat(document.getElementById('c2-m').value) || 0;
            let targetROI = parseFloat(document.getElementById('c2-rt').value) || 0;
            let move = parseFloat(document.getElementById('c2-v').value) || 0;

            let neededLev = targetROI / move;
            let posVal = margin * neededLev;

            document.getElementById('r2-lev').innerText = neededLev.toFixed(2) + "x";
            document.getElementById('r2-val').innerText = "$" + posVal.toFixed(2);
            document.getElementById('r2-tp1').innerText = "+" + targetROI.toFixed(1) + "%";
            document.getElementById('r2-tp2').innerText = "+" + (targetROI * 2).toFixed(1) + "%";
            document.getElementById('r2-amt').innerText = "$" + (margin * (targetROI/100)).toFixed(2);

        } else {
            // Logic: Lev = 1 / Vol%
            let margin = parseFloat(document.getElementById('c3-m').value) || 0;
            let vol = parseFloat(document.getElementById('c3-v').value) || 0;

            let optLev = 100 / vol;
            
            document.getElementById('r3-lev').innerText = optLev.toFixed(2) + "x";
            document.getElementById('r3-val').innerText = "$" + (margin * optLev).toFixed(2);
            document.getElementById('r3-liq').innerText = "-" + vol.toFixed(1) + "%";
            document.getElementById('r3-tp').innerText = "+" + (vol * 1.5).toFixed(1) + "%";
        }
    }
}

function resetC(n) {
    if(n === 1) ['c1-m','c1-l','c1-v','c1-r'].forEach(i => document.getElementById(i).value = "");
    if(n === 2) ['c2-m','c2-rt','c2-v'].forEach(i => document.getElementById(i).value = "");
    if(n === 3) ['c3-m','c3-v'].forEach(i => document.getElementById(i).value = "");
}

function flipTokens() {
    let f = document.getElementById('swap-from');
    let t = document.getElementById('swap-to');
    let tmp = f.innerText; f.innerText = t.innerText; t.innerText = tmp;
}

// Init
updateAuthUI();
</script>
</body>
</html>