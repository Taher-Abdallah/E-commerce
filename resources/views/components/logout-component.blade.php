                                <li class="menu-item">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}" class="menu-item-button"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            <div class="icon">
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                                    <polyline points="16 17 21 12 16 7" />
                                                    <line x1="21" y1="12" x2="9" y2="12" />
                                                </svg>
                                            </div>
                                            <div class="text">Logout</div>
                                        </a>
                                    </form>
                                </li>