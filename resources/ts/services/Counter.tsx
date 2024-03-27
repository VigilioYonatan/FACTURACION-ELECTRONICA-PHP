import { useSignal } from "@preact/signals";
function Counter() {
    const numero = useSignal(0);
    return (
        <div class="flex gap-6 items-center">
            <button
                class="bg-black p-4 rounded-full text-white"
                onClick={() => (numero.value += 1)}
                type="button"
                aria-label="increment"
            >
                +1
            </button>
            {numero.value}
            <button
                class="bg-black p-4 rounded-full text-white"
                onClick={() => (numero.value -= 1)}
                type="button"
                aria-label="decrement"
            >
                -1
            </button>
        </div>
    );
}

export default Counter;
