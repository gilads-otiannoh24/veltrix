import { CommonModule } from '@angular/common';
import { Component, type OnInit, HostListener, inject } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { NgIcon, provideIcons } from '@ng-icons/core';
import {
  heroArrowLeft,
  heroArrowLeftOnRectangle,
  heroArrowUturnRight,
  heroAtSymbol,
  heroBell,
  heroBookmark,
  heroBookOpen,
  heroBugAnt,
  heroChatBubbleBottomCenterText,
  heroChatBubbleLeftEllipsis,
  heroChatBubbleLeftRight,
  heroChevronDoubleDown,
  heroChevronDoubleUp,
  heroCog6Tooth,
  heroDocumentPlus,
  heroEye,
  heroHeart,
  heroInformationCircle,
  heroLightBulb,
  heroMagnifyingGlass,
  heroMoon,
  heroPlus,
  heroSpeakerWave,
  heroStar,
  heroSun,
  heroUser,
  heroXMark,
} from '@ng-icons/heroicons/outline';
import { featherAirplay } from '@ng-icons/feather-icons';
import { boxSort } from '@ng-icons/boxicons/regular';
import { ThemeService } from '../../core/services/theme.service';
import { LogoComponent } from '../../components/shared/logo/logo.component';

interface ForumCategory {
  id: number;
  name: string;
  description: string;
  icon: string;
  threads: number;
}

interface ForumThread {
  id: number;
  title: string;
  author: User;
  category: string;
  categoryId: number;
  replies: number;
  views: number;
  votes: number;
  isPinned: boolean;
  isAnnouncement: boolean;
  lastActivity: Date;
  tags: string[];
  content: string;
  posts: ForumPost[];
}

interface ForumPost {
  id: number;
  threadId: number;
  author: User;
  content: string;
  timestamp: Date;
  votes: number;
  isAcceptedAnswer: boolean;
  attachments?: string[];
  userVote?: 'up' | 'down' | null;
}

interface User {
  id: number;
  name: string;
  avatar: string;
  role: string;
  joinDate: Date;
  reputation: number;
  isOnline?: boolean;
}

interface Notification {
  id: number;
  type: 'mention' | 'reply' | 'like' | 'system';
  message: string;
  timestamp: Date;
  read: boolean;
  link: string;
}

@Component({
  selector: 'app-community',
  templateUrl: './community.component.html',
  styleUrls: ['./community.component.css'],
  imports: [FormsModule, NgIcon, CommonModule, LogoComponent],
  providers: [
    provideIcons({
      heroChevronDoubleDown,
      heroChevronDoubleUp,
      heroEye,
      heroChatBubbleBottomCenterText,
      heroBell,
      heroMoon,
      heroAtSymbol,
      heroHeart,
      heroInformationCircle,
      heroArrowUturnRight,
      heroMagnifyingGlass,
      heroXMark,
      heroChatBubbleLeftRight,
      heroChatBubbleLeftEllipsis,
      heroPlus,
      heroLightBulb,
      heroStar,
      heroBugAnt,
      heroBookOpen,
      heroDocumentPlus,
      heroSpeakerWave,
      heroBookmark,
      heroArrowLeft,
      heroSun,
      heroArrowLeftOnRectangle,
      heroUser,
      heroCog6Tooth,
      featherAirplay,
      boxSort,
    }),
  ],
})
export class CommunityComponent implements OnInit {
  categories: ForumCategory[] = [];
  threads: ForumThread[] = [];
  currentUser: User;
  selectedThread: ForumThread | null = null;
  selectedCategory: number | null = null;
  activeTab:
    | 'discussions'
    | 'feature-requests'
    | 'bug-reports'
    | 'announcements' = 'discussions';
  searchQuery = '';
  sortBy: 'newest' | 'popular' | 'unanswered' = 'newest';
  replyContent = '';
  isLoading = true;
  isMobile = false;
  sidebarOpen = true;
  notifications: Notification[] = [];
  unreadNotifications = 0;
  themeService = inject(ThemeService);

  constructor() {
    // Mock current user
    this.currentUser = {
      id: 1,
      name: 'Alex Johnson',
      avatar: '/assets/avatar.jpg',
      role: 'Student',
      joinDate: new Date('2024-01-15'),
      reputation: 342,
      isOnline: true,
    };
  }

  @HostListener('window:resize', ['$event'])
  onResize() {
    this.checkScreenSize();
  }

  checkScreenSize() {
    this.isMobile = window.innerWidth < 1024;
    // Close sidebar by default on mobile
    if (this.isMobile) {
      this.sidebarOpen = false;
    } else {
      this.sidebarOpen = true;
    }
  }

  toggleSidebar() {
    this.sidebarOpen = !this.sidebarOpen;
  }

  toggleTheme() {
    this.themeService.toggleDarkMode();
  }

  ngOnInit(): void {
    // Simulate loading data
    setTimeout(() => {
      this.loadMockData();
      this.isLoading = false;
    }, 800);
  }

  loadMockData(): void {
    // Mock categories
    this.categories = [
      {
        id: 1,
        name: 'General Discussion',
        description: 'General topics about studying and learning',
        icon: 'heroChatBubbleLeftEllipsis',
        threads: 124,
      },
      {
        id: 2,
        name: 'Study Techniques',
        description: 'Share and discuss effective study methods',
        icon: 'heroLightBulb',
        threads: 87,
      },
      {
        id: 3,
        name: 'Feature Requests',
        description: 'Suggest new features for Veltrix',
        icon: 'heroStar',
        threads: 56,
      },
      {
        id: 4,
        name: 'Bug Reports',
        description: 'Report issues with the platform',
        icon: 'heroBugAnt',
        threads: 32,
      },
      {
        id: 5,
        name: 'Course Discussions',
        description: 'Discuss specific courses and subjects',
        icon: 'heroBookOpen',
        threads: 215,
      },
      {
        id: 6,
        name: 'Study Resources',
        description: 'Share helpful study resources',
        icon: 'heroDocumentPlus',
        threads: 98,
      },
      {
        id: 7,
        name: 'Announcements',
        description: 'Official announcements from Veltrix team',
        icon: 'heroSpeakerWave',
        threads: 14,
      },
    ];

    // Mock users
    const users: User[] = [
      this.currentUser,
      {
        id: 2,
        name: 'Emma Wilson',
        avatar: '/assets/avatar2.jpg',
        role: 'Student',
        joinDate: new Date('2023-11-05'),
        reputation: 567,
        isOnline: true,
      },
      {
        id: 3,
        name: 'Michael Chen',
        avatar: '/assets/avatar3.jpg',
        role: 'Moderator',
        joinDate: new Date('2023-08-22'),
        reputation: 1243,
        isOnline: false,
      },
      {
        id: 4,
        name: 'Sarah Ahmed',
        avatar: '/assets/avatar4.jpg',
        role: 'Student',
        joinDate: new Date('2024-02-10'),
        reputation: 189,
        isOnline: true,
      },
      {
        id: 5,
        name: 'David Kim',
        avatar: '/assets/avatar5.jpg',
        role: 'Teaching Assistant',
        joinDate: new Date('2023-09-15'),
        reputation: 876,
        isOnline: false,
      },
    ];

    // Mock threads
    this.threads = [
      {
        id: 1,
        title: 'How to effectively use the Pomodoro technique for studying?',
        author: users[1],
        category: 'Study Techniques',
        categoryId: 2,
        replies: 24,
        views: 342,
        votes: 56,
        isPinned: true,
        isAnnouncement: false,
        lastActivity: new Date('2025-03-12T14:32:00'),
        tags: ['productivity', 'time-management', 'study-tips'],
        content:
          "I've been trying to implement the Pomodoro technique in my study routine, but I'm struggling with the optimal work/break ratio. The standard 25/5 doesn't seem to work well for me. Has anyone experimented with different intervals? What has worked best for you, especially for subjects that require deep focus like mathematics or programming?",
        posts: [],
      },
      {
        id: 2,
        title: 'Feature Request: Dark mode for the Study Area',
        author: users[3],
        category: 'Feature Requests',
        categoryId: 3,
        replies: 18,
        views: 215,
        votes: 87,
        isPinned: false,
        isAnnouncement: false,
        lastActivity: new Date('2025-03-13T09:45:00'),
        tags: ['ui', 'dark-mode', 'feature-request'],
        content:
          'I often study late at night and the bright interface strains my eyes. Could we get a dark mode option for the Study Area? Ideally with customizable accent colors to maintain the purple theme but with a darker background.',
        posts: [],
      },
      {
        id: 3,
        title: 'Bug: Calendar events disappearing after sync',
        author: users[0],
        category: 'Bug Reports',
        categoryId: 4,
        replies: 7,
        views: 98,
        votes: 12,
        isPinned: false,
        isAnnouncement: false,
        lastActivity: new Date('2025-03-14T11:20:00'),
        tags: ['bug', 'calendar', 'sync-issue'],
        content:
          "I've noticed that when I sync my calendar with Google Calendar, some of my study sessions disappear. This happens specifically with recurring events. Has anyone else experienced this issue? Any workarounds?",
        posts: [],
      },
      {
        id: 4,
        title: '[ANNOUNCEMENT] New Collaborative Study Rooms Feature',
        author: users[2],
        category: 'Announcements',
        categoryId: 7,
        replies: 42,
        views: 876,
        votes: 156,
        isPinned: true,
        isAnnouncement: true,
        lastActivity: new Date('2025-03-10T15:00:00'),
        tags: ['announcement', 'new-feature', 'collaboration'],
        content:
          "We're excited to announce the launch of our new Collaborative Study Rooms feature! Starting next week, you'll be able to create virtual study rooms where you can collaborate with classmates in real-time. Features include shared whiteboards, document collaboration, video chat, and integrated pomodoro timers. Check out the tutorial video for more details!",
        posts: [],
      },
      {
        id: 5,
        title: 'Resources for Advanced Calculus',
        author: users[4],
        category: 'Study Resources',
        categoryId: 6,
        replies: 15,
        views: 203,
        votes: 34,
        isPinned: false,
        isAnnouncement: false,
        lastActivity: new Date('2025-03-11T16:45:00'),
        tags: ['calculus', 'resources', 'advanced-math'],
        content:
          "I'm looking for good resources for Advanced Calculus, specifically for topics like multivariable calculus and vector analysis. Any recommendations for textbooks, online courses, or video lectures that explain these concepts clearly?",
        posts: [],
      },
      {
        id: 6,
        title: 'How do you organize your digital notes?',
        author: users[3],
        category: 'General Discussion',
        categoryId: 1,
        replies: 31,
        views: 289,
        votes: 42,
        isPinned: false,
        isAnnouncement: false,
        lastActivity: new Date('2025-03-13T13:20:00'),
        tags: ['notes', 'organization', 'productivity'],
        content:
          "I'm curious how everyone organizes their digital notes in Veltrix. Do you organize by subject, date, or some other system? Do you use tags, folders, or both? I'm trying to develop a better system for my own notes and would love to hear what works for others.",
        posts: [],
      },
    ];

    // Generate mock posts for each thread
    this.threads.forEach((thread) => {
      // Original post is the thread content
      thread.posts.push({
        id: thread.id * 100,
        threadId: thread.id,
        author: thread.author,
        content: thread.content,
        timestamp: new Date(
          thread.lastActivity.getTime() - Math.random() * 86400000 * 5
        ),
        votes: thread.votes,
        isAcceptedAnswer: false,
      });

      // Generate random replies
      const replyCount = thread.replies;
      for (let i = 1; i <= replyCount; i++) {
        const randomUser = users[Math.floor(Math.random() * users.length)];
        const randomTime = new Date(
          thread.lastActivity.getTime() - Math.random() * 86400000 * 3
        );
        const randomVotes = Math.floor(Math.random() * 20);

        thread.posts.push({
          id: thread.id * 100 + i,
          threadId: thread.id,
          author: randomUser,
          content: this.generateRandomReply(),
          timestamp: randomTime,
          votes: randomVotes,
          isAcceptedAnswer: i === 1 && thread.categoryId === 4, // Make first reply the accepted answer for bug reports
          userVote:
            Math.random() > 0.7 ? (Math.random() > 0.5 ? 'up' : 'down') : null,
        });
      }

      // Sort posts by timestamp
      thread.posts.sort(
        (a, b) => a.timestamp.getTime() - b.timestamp.getTime()
      );
    });

    // Generate mock notifications
    this.notifications = [
      {
        id: 1,
        type: 'reply',
        message:
          'Emma Wilson replied to your thread "Bug: Calendar events disappearing after sync"',
        timestamp: new Date(Date.now() - 1000 * 60 * 30), // 30 minutes ago
        read: false,
        link: '/community/thread/3',
      },
      {
        id: 2,
        type: 'like',
        message:
          'Michael Chen liked your reply in "Resources for Advanced Calculus"',
        timestamp: new Date(Date.now() - 1000 * 60 * 60 * 2), // 2 hours ago
        read: false,
        link: '/community/thread/5',
      },
      {
        id: 3,
        type: 'mention',
        message:
          'Sarah Ahmed mentioned you in "How do you organize your digital notes?"',
        timestamp: new Date(Date.now() - 1000 * 60 * 60 * 5), // 5 hours ago
        read: true,
        link: '/community/thread/6',
      },
      {
        id: 4,
        type: 'system',
        message:
          'Your feature request "Dark mode for Study Area" has been marked as under review',
        timestamp: new Date(Date.now() - 1000 * 60 * 60 * 24), // 1 day ago
        read: true,
        link: '/community/thread/2',
      },
    ];

    // Count unread notifications
    this.unreadNotifications = this.notifications.filter((n) => !n.read).length;
  }

  generateRandomReply(): string {
    const replies = [
      "I've found that breaking down complex topics into smaller chunks helps a lot. Try creating a mind map to visualize the connections between different concepts.",
      "Have you tried the Feynman Technique? It's where you explain the concept in simple terms as if teaching someone else. It really helps identify gaps in your understanding.",
      'I recommend checking out Khan Academy for this topic. Their videos are really clear and they have practice exercises too.',
      'I had the same issue! What worked for me was setting specific goals for each study session rather than just studying for a set amount of time.',
      "Thanks for sharing this! I've been looking for something exactly like this for my study routine.",
      "I disagree with the previous approach. In my experience, it's better to focus on understanding the fundamental principles first before diving into practice problems.",
      "Has anyone tried using spaced repetition software like Anki for this? I've heard good things but haven't tried it myself.",
      "This is a great point! I'd also add that consistent daily practice, even if it's just 15-20 minutes, is more effective than cramming once a week.",
      "I've been using this technique for the past semester and my grades have improved significantly. Highly recommend giving it a try!",
      "Could you elaborate more on how you implemented this in your study routine? I'm interested but not sure where to start.",
    ];
    return replies[Math.floor(Math.random() * replies.length)];
  }

  viewThread(thread: ForumThread): void {
    this.selectedThread = thread;
    // In a real app, you would fetch the thread details and posts from an API

    // Close sidebar on mobile when viewing a thread
    if (this.isMobile) {
      this.sidebarOpen = false;
    }
  }

  closeThread(): void {
    this.selectedThread = null;
  }

  filterByCategory(categoryId: number | null): void {
    this.selectedCategory = categoryId;
    this.selectedThread = null;

    // Close sidebar on mobile when filtering
    if (this.isMobile) {
      this.sidebarOpen = false;
    }
  }

  getTabText() {
    return this.selectedCategory !== null
      ? this.categories.find((c) => c.id === this.selectedCategory)?.name ||
          'Discussions'
      : this.activeTab === 'discussions'
      ? 'All Discussions'
      : this.activeTab === 'feature-requests'
      ? 'Feature Requests'
      : this.activeTab === 'bug-reports'
      ? 'Bug Reports'
      : 'Announcements';
  }

  getTabDescription() {
    return this.selectedCategory !== null
      ? this.categories.find((c) => c.id === this.selectedCategory)
          ?.description || ''
      : this.activeTab === 'discussions'
      ? 'Join the conversation with fellow students'
      : this.activeTab === 'feature-requests'
      ? 'Suggest new features for Veltrix'
      : this.activeTab === 'bug-reports'
      ? 'Report and track platform issues'
      : 'Official updates from the Veltrix team';
  }

  changeTab(
    tab: 'discussions' | 'feature-requests' | 'bug-reports' | 'announcements'
  ): void {
    this.activeTab = tab;
    this.selectedThread = null;

    // In a real app, you would fetch the appropriate threads from an API
    // For now, we'll just filter the mock data
    if (tab === 'discussions') {
      this.selectedCategory = null;
    } else if (tab === 'feature-requests') {
      this.filterByCategory(3); // Feature Requests category
    } else if (tab === 'bug-reports') {
      this.filterByCategory(4); // Bug Reports category
    } else if (tab === 'announcements') {
      this.filterByCategory(7); // Announcements category
    }
  }

  changeSortOrder(sort: 'newest' | 'popular' | 'unanswered'): void {
    this.sortBy = sort;
    // In a real app, you would re-fetch or re-sort the threads
  }

  search(): void {
    // In a real app, you would search the threads based on the query
    console.log('Searching for:', this.searchQuery);

    // Close sidebar on mobile when searching
    if (this.isMobile) {
      this.sidebarOpen = false;
    }
  }

  submitReply(): void {
    if (!this.replyContent.trim() || !this.selectedThread) return;

    // In a real app, you would send this to an API
    const newPost: ForumPost = {
      id: Math.floor(Math.random() * 10000),
      threadId: this.selectedThread.id,
      author: this.currentUser,
      content: this.replyContent,
      timestamp: new Date(),
      votes: 0,
      isAcceptedAnswer: false,
    };

    this.selectedThread.posts.push(newPost);
    this.selectedThread.replies++;
    this.selectedThread.lastActivity = new Date();
    this.replyContent = '';
  }

  vote(post: ForumPost, direction: 'up' | 'down'): void {
    // If user already voted this way, remove the vote
    if (post.userVote === direction) {
      post.votes += direction === 'up' ? -1 : 1;
      post.userVote = null;
    }
    // If user voted the opposite way, change the vote (counts as 2)
    else if (post.userVote) {
      post.votes += direction === 'up' ? 2 : -2;
      post.userVote = direction;
    }
    // If user hasn't voted yet, add the vote
    else {
      post.votes += direction === 'up' ? 1 : -1;
      post.userVote = direction;
    }
  }

  createNewThread(): void {
    // In a real app, this would open a form to create a new thread
    console.log('Creating new thread');
  }

  markAsAnswer(post: ForumPost): void {
    if (!this.selectedThread) return;

    // Remove current accepted answer if any
    this.selectedThread.posts.forEach((p) => {
      if (p.isAcceptedAnswer) p.isAcceptedAnswer = false;
    });

    // Mark this post as accepted answer
    post.isAcceptedAnswer = true;
  }

  markNotificationAsRead(notification: Notification): void {
    notification.read = true;
    this.unreadNotifications = this.notifications.filter((n) => !n.read).length;
  }

  markAllNotificationsAsRead(): void {
    this.notifications.forEach((n) => (n.read = true));
    this.unreadNotifications = 0;
  }

  getFilteredThreads(): ForumThread[] {
    let filtered = [...this.threads];

    // Filter by category if selected
    if (this.selectedCategory !== null) {
      filtered = filtered.filter(
        (thread) => thread.categoryId === this.selectedCategory
      );
    }

    // Filter by tab
    if (this.activeTab === 'feature-requests') {
      filtered = filtered.filter((thread) => thread.categoryId === 3);
    } else if (this.activeTab === 'bug-reports') {
      filtered = filtered.filter((thread) => thread.categoryId === 4);
    } else if (this.activeTab === 'announcements') {
      filtered = filtered.filter((thread) => thread.isAnnouncement);
    }

    // Filter by search query
    if (this.searchQuery) {
      const query = this.searchQuery.toLowerCase();
      filtered = filtered.filter(
        (thread) =>
          thread.title.toLowerCase().includes(query) ||
          thread.content.toLowerCase().includes(query) ||
          thread.tags.some((tag) => tag.toLowerCase().includes(query))
      );
    }

    // Sort threads
    if (this.sortBy === 'newest') {
      filtered.sort(
        (a, b) => b.lastActivity.getTime() - a.lastActivity.getTime()
      );
    } else if (this.sortBy === 'popular') {
      filtered.sort((a, b) => b.votes - a.votes);
    } else if (this.sortBy === 'unanswered') {
      filtered.sort((a, b) => {
        const aHasAnswer = a.posts.some((p) => p.isAcceptedAnswer);
        const bHasAnswer = b.posts.some((p) => p.isAcceptedAnswer);
        if (!aHasAnswer && bHasAnswer) return -1;
        if (aHasAnswer && !bHasAnswer) return 1;
        return b.lastActivity.getTime() - a.lastActivity.getTime();
      });
    }

    return filtered;
  }

  formatDate(date: Date): string {
    const now = new Date();
    const diff = now.getTime() - date.getTime();
    const day = 24 * 60 * 60 * 1000;

    if (diff < 60 * 1000) {
      return 'just now';
    } else if (diff < 60 * 60 * 1000) {
      const minutes = Math.floor(diff / (60 * 1000));
      return `${minutes} minute${minutes > 1 ? 's' : ''} ago`;
    } else if (diff < day) {
      const hours = Math.floor(diff / (60 * 60 * 1000));
      return `${hours} hour${hours > 1 ? 's' : ''} ago`;
    } else if (diff < 7 * day) {
      const days = Math.floor(diff / day);
      return `${days} day${days > 1 ? 's' : ''} ago`;
    } else {
      return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
      });
    }
  }

  logout(): void {
    // In a real app, this would handle logout logic
    console.log('Logging out');
  }
}
