export const isFulfilled = sliceName => action => action.type.startsWith(sliceName) && action.type.endsWith('/fulfilled');
export const isRejected = sliceName => action => action.type.startsWith(sliceName) && action.type.endsWith('/rejected');
export const isPending = sliceName => action => action.type.startsWith(sliceName) && action.type.endsWith('/pending');