import { useRef } from 'react';

export default function useDebounce(mainDelayMs = 350) {
    const queue = useRef(null);

    return (callback, delayMs = mainDelayMs) => {
        clearTimeout(queue.current);
        queue.current = setTimeout(callback, delayMs);
    };
}