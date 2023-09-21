const INPUT = document.querySelector('input')

const TOGGLE = () => {
  document.documentElement.className = INPUT.checked ? 'use-subgrid' : ''
}


const CHANGE = () => {
  if (!document.startViewTransition) TOGGLE()
  else document.startViewTransition(TOGGLE)
}

INPUT.addEventListener('change', CHANGE)