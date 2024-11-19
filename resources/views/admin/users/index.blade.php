<x-admin>
    <h1 class="text-lg mb-4 text-gray-500 text-start">DASHBOARD ADMIN <span class="text-gray-900">/ DAFTAR USER</span>
    </h1>


    {{-- <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3 mb-6 rounded-lg animate-pulse"
        role="alert">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M9 12l-2-2 1.414-1.414L9 9.172l3.586-3.586L14 6l-5 5z" />
        </svg>
        <span>{{ session('success') }}</span>
    </div> --}}


    @if (session('success'))
        <div id="alert-border-1"
            class="flex items-center p-4 mb-4 text-blue-800 border-t-4 border-blue-300 bg-blue-50 dark:border-blue-700 rounded-lg"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div class="ms-3 text-sm font-medium">
                <span>{{ session('success') }}</span>
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:text-blue-400"
                data-dismiss-target="#alert-border-1" aria-label="Close">
                <span class="sr-only">Dismiss</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-900 dark:text-gray-900">
            <thead class="text-xs text-gray-900 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200">
                <tr class="[&>th]:text-center">
                    <th scope="col" class="px-4 py-4">NAMA</th>
                    <th scope="col" class="px-4 py-3">EMAIL</th>
                    <th scope="col" class="px-4 py-3">ROLE</th>
                    <th scope="col" class="px-4 py-3">TANGGAL PENDAFTARAN</th>
                    <th scope="col" class="px-4 py-3">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-b dark:border-gray-700 [&>td]:text-center hover:bg-gray-50 dark:hover:bg-[rgba(0,0,0,0.2)]">
                        <td scope="row"
                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-gray-900">
                            {{ $user->nama }}</td>
                        <td class="px-4 py-3">{{ $user->email }}</td>
                        <td class="px-4 py-3">{{ ucfirst($user->usertype) }}</td>
                        <td class="px-4 py-3">{{ $user->created_at->format('d M Y') }}</td>
                        <td class="px-4 py-3 flex items-center justify-center">
                            <ul class="p-0 m-0 text-sm flex" aria-labelledby="apple-imac-27-dropdown-button">
                                <li>
                                    <button type="button" data-modal-target="updateProductModal-{{ $user->id }}"
                                        data-modal-toggle="updateProductModal-{{ $user->id }}"
                                        class="flex w-full items-center py-2 px-4 rounded-xl hover:bg-gray-100 dark:hover:bg-[rgba(0,0,0,0.2)] dark:hover:text-white text-gray-700 dark:text-gray-200">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAACXBIWXMAAAsTAAALEwEAmpwYAAABuUlEQVR4nO3Wv0vDQBQH8Cgi6CIo/garq3+D4B9gm7sWMjqLbqKSuxYM/gOOoqP4fzjYzUWxVkUHXdwk9b22CIJGXpvYtM1vsggeZEjT3ufe996FKkrKw9CsYcHwTDD4EhwPFcUaSNtQdM0cKxXMjORwIzladAkGR6lihmENSoaXkkG5lKstdWGtytJAtPdxyXBD57giGNb7MAafiuBw7siRLgZlNyI4TAgOV/bzfS9McDxVYiGtGODCQaSGk5LBdec5fEuOm11YwcxQg/xCcePayden3PvgxgRDvY1BRc+aC+1VJYBkrj4tOdz6V04YrFODdH4UE6JKaKWB8TJ8of3pXl0MKLwS9EbiQLtaY0ZwqIY0y7POaoveq4wAESIZ3IVU8lhca877xxECGdnXUcnxKbjl8WFPbc4FRhIGSYa8fVDxjaLprwTui/nGbOf7UO491NEgDid2NFt0Lzg23UhvJb7zhUHURfakB4QJBh/2fYW6MPJ8QZBUcdnnNVSl8+SdQBLI2R/7fAgOx/TZtmaN+CWQCDJWrSGhgkqV+U3cOxLvUdwh/6G/H51M+eqH6N2UMuL+X+GMH1xA+MfgGhYhAAAAAElFTkSuQmCC"
                                            alt="create-new">
                                    </button>
                                </li>
                                <li>
                                    <button type="button" data-modal-target="deleteModal-{{ $user->id }}"
                                        data-modal-toggle="deleteModal-{{ $user->id }}"
                                        class="flex w-full items-center py-2 px-4 rounded-xl hover:bg-gray-100 dark:hover:bg-[rgba(0,0,0,0.2)] text-red-500 dark:hover:text-red-400">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABNUlEQVR4nOWUwU0DQQxF98KFNAEVQAWhgcDme5XbIm65hArgwhEqIBVABVAAkA5SQbilADYeIS2akZHIaFh7VkgIYcnSzsjr5z/jcVH8C2PgyhG1X52JrrMTxUn6+u8BvDlgGY4AOAgbBvOxITmw1IOJHn3whujYCtgAJ1LUgwUwl2pmn3ux9MT6XC7+VgU4osu4S5wCYOBGirqwKDiV4LsMBfehqKqqdQXj8ZGc50uGgoXsDVVAM5nsS/AqQ8GrXzdluacC2ul0h4F37/5bA6TiVYsrch2AlGLV4jN1HYDUnVkUbHWF6wCkus6iYKuvXZeCxLvRFQAz+WkuVT7HAAaevnv5PzpbuMfsKrgsD63T0fWYvkVb1wMGGuv8Z+CtHY12zYCgoqrOGFgbkq99J2Ul/1P2AZG38TDRVJKRAAAAAElFTkSuQmCC"
                                            alt="waste">
                                    </button>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Update modal -->
    @foreach ($users as $user)
        <div id="updateProductModal-{{ $user->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Modal header -->
                    <div
                        class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Edit User</h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="updateProductModal-{{ $user->id }}">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{ route('admin.users.updateUser', $user->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PATCH')

                        <!-- Input untuk Nama -->
                        <div>
                            <label for="nama" class="block text-white font-semibold mb-2">Nama</label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama', $user->nama) }}"
                                class="p-2 w-full border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('nama')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Input untuk Email -->
                        <div>
                            <label for="email" class="block text-white font-semibold mb-2">Email</label>
                            <input type="email" name="email" id="email"
                                value="{{ old('email', $user->email) }}"
                                class="p-2 w-full border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Dropdown untuk Role -->
                        <div>
                            <label for="usertype" class="block text-white font-semibold mb-2">Role</label>
                            <select name="usertype" id="usertype"
                                class="p-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="user" {{ $user->usertype == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ $user->usertype == 'admin' ? 'selected' : '' }}>Admin
                                </option>
                            </select>
                        </div>

                        <!-- Tombol Simpan -->
                        <div>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Delete modal -->
    @foreach ($users as $user)
        <div id="deleteModal-{{ $user->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <button type="button"
                        class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="deleteModal-{{ $user->id }}">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true"
                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <p class="mb-4 text-gray-500 dark:text-gray-300">Apakah Anda Yakin ingin menghapus user dangan nama
                        {{ $user->nama }}?</p>
                    <div class="flex justify-center items-center space-x-4">
                        <button data-modal-toggle="deleteModal-{{ $user->id }}" type="button"
                            class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batalkan</button>
                        <form action="{{ route('admin.users.destroyUser', $user->id) }}" method="POST"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="flex items-center px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-200">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-admin>
