import { CommonModule } from '@angular/common';
import { Component, type OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';

interface Note {
  id: string;
  title: string;
  content: string;
  lastModified: Date;
  tags: string[];
  readOnly?: boolean;
}

@Component({
  selector: 'app-study-area',
  templateUrl: './study-area2.component.html',
  styleUrls: ['./study-area2.component.css'],
  imports: [CommonModule, FormsModule],
})
export class StudyArea2Component implements OnInit {
  // User info
  userName = 'Alex Johnson';
  userAvatar = 'assets/images/avatar.jpg';

  // UI state
  isSidebarCollapsed = false;
  isDarkMode = true;
  isFocusMode = false;
  isAIChatOpen = false;
  isSettingsPanelOpen = false;
  isReadOnly = false;
  autoSave = true;
  editorView: 'edit' | 'preview' | 'split' = 'edit';
  activeHeadingLevel = 'paragraph';
  editingTime = 0;
  editingTimer: any;

  // Current document
  currentNote: Note = {
    id: '1',
    title: 'Quantum Mechanics - Wave Functions',
    content:
      '<h2>Wave-Particle Duality</h2><p>In quantum mechanics, every particle or quantum entity may be described as either a particle or a wave. This duality addresses the inability of classical concepts like "particle" or "wave" to fully describe the behavior of quantum-scale objects.</p><h3>Key Concepts:</h3><ul><li>Wave functions describe the quantum state of a particle</li><li>The probability of finding a particle at a specific position is given by |Ψ|²</li><li>Heisenberg\'s uncertainty principle limits precision of measurements</li></ul>',
    lastModified: new Date(),
    tags: ['physics', 'quantum', 'notes'],
    readOnly: false,
  };

  // Notes collection
  recentNotes: Note[] = [
    {
      id: '1',
      title: 'Quantum Mechanics - Wave Functions',
      content:
        '<h2>Wave-Particle Duality</h2><p>In quantum mechanics, every particle or quantum entity may be described as either a particle or a wave.</p>',
      lastModified: new Date(),
      tags: ['physics', 'quantum', 'notes'],
    },
    {
      id: '2',
      title: 'Calculus - Integration by Parts',
      content:
        "<h2>Integration by Parts Formula</h2><p>∫u(x)v'(x)dx = u(x)v(x) - ∫u'(x)v(x)dx</p>",
      lastModified: new Date(Date.now() - 86400000),
      tags: ['math', 'calculus', 'notes'],
      readOnly: true,
    },
    {
      id: '3',
      title: 'Data Structures - Binary Trees',
      content:
        '<h2>Binary Tree Traversal</h2><p>There are three common ways to traverse a binary tree: in-order, pre-order, and post-order.</p>',
      lastModified: new Date(Date.now() - 172800000),
      tags: ['cs', 'data structures', 'notes'],
    },
  ];

  // Editor state
  editorContent = '';

  constructor() {}

  ngOnInit(): void {
    this.editorContent = this.currentNote.content;
    this.isReadOnly = this.currentNote.readOnly || false;

    // Check for saved theme preference
    const savedTheme = localStorage.getItem('veltrix-theme');
    if (savedTheme === 'light') {
      this.isDarkMode = false;
      document.documentElement.classList.remove('dark');
    } else {
      this.isDarkMode = true;
      document.documentElement.classList.add('dark');
    }

    // Start editing timer
    this.startEditingTimer();
  }

  ngOnDestroy(): void {
    this.stopEditingTimer();
  }

  startEditingTimer(): void {
    this.editingTimer = setInterval(() => {
      this.editingTime++;

      // Auto save every 2 minutes if enabled
      if (this.autoSave && this.editingTime % 120 === 0 && !this.isReadOnly) {
        this.saveNote(true);
      }
    }, 1000);
  }

  stopEditingTimer(): void {
    if (this.editingTimer) {
      clearInterval(this.editingTimer);
    }
  }

  formatEditingTime(): string {
    const minutes = Math.floor(this.editingTime / 60);
    const seconds = this.editingTime % 60;
    return `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
  }

  toggleSidebar(): void {
    this.isSidebarCollapsed = !this.isSidebarCollapsed;
  }

  toggleDarkMode(): void {
    this.isDarkMode = !this.isDarkMode;
    document.documentElement.classList.toggle('dark', this.isDarkMode);
    localStorage.setItem('veltrix-theme', this.isDarkMode ? 'dark' : 'light');
  }

  toggleFocusMode(): void {
    this.isFocusMode = !this.isFocusMode;
    if (this.isFocusMode) {
      this.isSettingsPanelOpen = false;
      this.isAIChatOpen = false;
    }
  }

  toggleAIChat(): void {
    this.isAIChatOpen = !this.isAIChatOpen;
    if (this.isAIChatOpen) {
      this.isSettingsPanelOpen = false;
    }
  }

  toggleSettingsPanel(): void {
    this.isSettingsPanelOpen = !this.isSettingsPanelOpen;
    if (this.isSettingsPanelOpen) {
      this.isAIChatOpen = false;
    }
  }

  toggleReadOnly(): void {
    this.isReadOnly = !this.isReadOnly;
    this.currentNote.readOnly = this.isReadOnly;
  }

  toggleAutoSave(): void {
    this.autoSave = !this.autoSave;
  }

  changeEditorView(view: 'edit' | 'preview' | 'split'): void {
    this.editorView = view;
  }

  setHeadingLevel(level: string): void {
    this.activeHeadingLevel = level;
    // In a real implementation, this would apply the heading to the selected text
    console.log(`Set heading to ${level}`);
  }

  saveNote(isAutoSave = false): void {
    this.currentNote.content = this.editorContent;
    this.currentNote.lastModified = new Date();

    // Update in recent notes
    const index = this.recentNotes.findIndex(
      (note) => note.id === this.currentNote.id
    );
    if (index !== -1) {
      this.recentNotes[index] = { ...this.currentNote };
    }

    // Show save confirmation
    if (!isAutoSave) {
      // This would be a toast notification in a real implementation
      console.log('Note saved successfully!');
    }
  }

  createNewNote(): void {
    const newNote: Note = {
      id: Date.now().toString(),
      title: 'Untitled Document',
      content: '<p>Start writing your notes here...</p>',
      lastModified: new Date(),
      tags: ['new'],
      readOnly: false,
    };

    this.recentNotes.unshift(newNote);
    this.currentNote = newNote;
    this.editorContent = newNote.content;
    this.isReadOnly = false;
    this.editingTime = 0;
  }

  openNote(note: Note): void {
    this.currentNote = { ...note };
    this.editorContent = note.content;
    this.isReadOnly = note.readOnly || false;
    this.editingTime = 0;
  }

  updateEditorContent(content: string): void {
    this.editorContent = content;
  }

  applyFormatting(format: string): void {
    // In a real implementation, this would apply formatting to the selected text
    console.log(`Applied ${format} formatting`);
  }

  insertElement(element: string): void {
    // In a real implementation, this would insert the element at the cursor position
    console.log(`Inserted ${element}`);
  }
}
