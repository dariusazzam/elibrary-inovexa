function toast(msg) {
  const t = document.getElementById('toast');
  if (!t) return;
  t.textContent = msg;
  t.className = 's';
  clearTimeout(toast.x);
  toast.x = setTimeout(() => (t.className = ''), 2600);
}

function eye(...ids) {
  const targetIds = ids.length ? ids : ['p'];
  targetIds.forEach(id => {
    const el = document.getElementById(id);
    if (el) {
      el.type = el.type === 'password' ? 'text' : 'password';
    }
  });
}

function openModal(id) {
  const el = document.getElementById(id);
  if (el) el.style.display = 'grid';
}

function closeModal(id) {
  const el = document.getElementById(id);
  if (el) el.style.display = 'none';
}

if (window.TOAST) toast(window.TOAST);
