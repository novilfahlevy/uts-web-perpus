const borrowedAt = document.getElementById('borrowed_at')
const dueAt = document.getElementById('due_at')
const price = document.getElementById('price')
const borrowingPriceResult = document.getElementById('borrowingPriceResult')

function calculateBorrowingPrice() {
  const borrowedAtDate = new Date(borrowedAt.value);
  const dueAtDate = new Date(dueAt.value);
  const diffTime = Math.abs(dueAtDate - borrowedAtDate);
  const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

  if (borrowedAt.value && dueAt.value && price.value) {
    const formattedPrice = new Intl.NumberFormat(
      'id-ID',
      {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
      }
    ).format(diffDays * price.value)

    borrowingPriceResult.textContent = formattedPrice
  }
}

document.addEventListener('DOMContentLoaded', calculateBorrowingPrice);
borrowedAt.addEventListener('change', calculateBorrowingPrice);
dueAt.addEventListener('change', calculateBorrowingPrice);
price.addEventListener('change', calculateBorrowingPrice);